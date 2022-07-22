<?php

namespace App\Services\Admin;

use App\Services\BaseService;
use App\Repositories\AdminRepository;
use Illuminate\Support\Facades\Hash;

class AdminService extends BaseService
{
    protected $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function getAdminList()
    {
        return $this->adminRepository->getAdminList();
    }

    public function create($data)
    {
        return $this->adminRepository->create(array(
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'] ?? null)
        ));
    }

    public function update($data)
    {
        return $this->adminRepository->update($data, $data['id']);
    }

    public function delete($id)
    {
        return $this->adminRepository->delete($id);
    }
}
