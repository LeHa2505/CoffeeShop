<?php

namespace App\Repositories;

use App\Models\Staff;

class StaffRepository extends BaseRepository
{

    public function model()
    {
        return Staff::class;
    }

    public function getStaffList()
    {
        return $this->model->wherePosition(Staff::POSITION_CASHIER)->select()->get();
    }
}
