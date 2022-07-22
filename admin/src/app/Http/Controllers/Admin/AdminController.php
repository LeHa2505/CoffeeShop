<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Services\Admin\AdminService;
use App\Http\Requests\CreateAccountRequest;

class AdminController extends Controller
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index()
    {
        return view('admin.account.index');
    }

    public function show(DataTables $dataTables)
    {
        return $dataTables->eloquent($this->adminService->getAdminList())->toJson();
    }

    public function create(Request $request)
    {
        return $this->adminService->create($request->all());
    }

    public function update(Request $request)
    {
        return $this->adminService->update($request->all());
    }

    public function delete(Request $request)
    {
        return $this->adminService->delete($request->get('id'));
    }
}
