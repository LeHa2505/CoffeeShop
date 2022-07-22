<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository extends BaseRepository
{

    public function model()
    {
        return Order::class;
    }

    public function getOrderList()
    {
        return $this->model->with(['orderDetail', 'staff', 'customer']);
    }
}
