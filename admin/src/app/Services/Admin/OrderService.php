<?php

namespace App\Services\Admin;

use App\Models\Order;
use App\Repositories\OrderRepository;
use App\Repositories\OrderDetailRepository;
use App\Repositories\ProductRepository;
use App\Repositories\StaffRepository;
use App\Services\BaseService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class OrderService extends BaseService
{
    protected $orderRepository;
    protected $orderDetailRepository;
    protected $productRepository;
    protected $staffRepository;

    public function __construct
    (
        OrderRepository $orderRepository,
        OrderDetailRepository $orderDetailRepository,
        ProductRepository $productRepository,
        StaffRepository $staffRepository
    )
    {
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
        $this->productRepository = $productRepository;
        $this->staffRepository = $staffRepository;
    }

    public function getOrderList()
    {
        return $this->orderRepository->getOrderList();
    }

    public function orderDetail($id)
    {
        return $this->orderDetailRepository->getOrderDetail($id);
    }

    public function update($data)
    {
        return $this->orderRepository->update($data, $data['id']);
    }

    public function getProductList()
    {
        return $this->productRepository->getProduct();
    }

    public function create($data)
    {
        $order = $this->orderRepository->create([
            'staff_id' => $data['staff_id'],
            'total_price' => $data['total'],
            'customer_paid' => $data['customer_paid'],
            'refunds' => $data['refunds'],
            'order_date' => Carbon::now()
        ]);

        $this->orderRepository->update([
            'order_code' => str_pad($order->id,8,"0", STR_PAD_LEFT)
        ], $order->id);

        $order_detail = $data['order_detail'];

        foreach ($order_detail as $key => $product) {
            $order_detail[$key]['order_id'] = $order->id;
        }

        return $this->orderDetailRepository->insertMany($order_detail);
    }

    public function getStaffList()
    {
        return $this->staffRepository->getStaffList();
    }
}
