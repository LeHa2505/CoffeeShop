<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Services\Admin\UserContactService;

class UserContactController extends Controller
{
    protected $userContactService;

    public function __construct(UserContactService $userContactService)
    {
        $this->userContactService = $userContactService;
    }

    public function index()
    {
        return view('admin.contact.index');
    }

    public function show(DataTables $dataTables)
    {
        return $dataTables->eloquent($this->userContactService->getContactList())->toJson();
    }

    public function delete(Request $request)
    {
        return $this->userContactService->delete($request->get('id'));
    }

    public function update(Request $request)
    {
        return $this->userContactService->update($request->all());
    }
}
