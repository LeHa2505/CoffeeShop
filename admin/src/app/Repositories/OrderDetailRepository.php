<?php

namespace App\Repositories;

use App\Models\OrderDetail;

class OrderDetailRepository extends BaseRepository
{

    public function model()
    {
        return OrderDetail::class;
    }

    public function getOrderDetail($id)
    {
        return $this->model->with('product')->whereOrderId($id)->select()->get();
    }
}

