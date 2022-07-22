<?php

namespace App\Repositories;

use App\Models\UserContact;

class UserContactRepository extends BaseRepository
{
    public function model()
    {
        return UserContact::class;
    }

    public function getContactList()
    {
        return $this->model->whereNull('deleted_at')->select();
    }
}
