<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\OrderService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        return view('admin.order.index');
    }

    public function show(Request $request)
    {
        return collect(DataTables::eloquent($this->orderService->getOrderList())
            ->filter(function ($query) use ($request) {
                if ($request->get('order_code') && !is_null($request->get('order_code'))) {
                    $query->where('order_code', $request->get('order_code'));
                }
                if ($request->get('order_date') && !is_null($request->get('order_date'))) {
                    $query->whereDate('order_date', $request->get('order_date'));
                }
            }))->toJson();
    }

    public function update(Request $request)
    {
        return $this->orderService->update($request->all());
    }

    public function orderDetail(Request $request)
    {
        return $this->orderService->orderDetail($request->get('id'));
    }

    public function newOrder() {
        $staffs = $this->orderService->getStaffList();
        return view('admin.order.new')->with('staffs', $staffs);;
    }

    public function getProductList() {
        return $this->orderService->getProductList();
    }

    public function create(Request $request) {
        return $this->orderService->create($request->all());
    }
}
