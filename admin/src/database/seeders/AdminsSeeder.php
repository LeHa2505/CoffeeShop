<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::create([
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make(12345678),
            'role' => 1,
        ]);

        Admin::create([
            'email' => 'normaladmin@gmail.com',
            'password' => Hash::make(12345678),
        ]);
    }
}
