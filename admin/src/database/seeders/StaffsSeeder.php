<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;

class StaffsSeeder extends Seeder
{
    protected $staffs = [
        [
            'fullname' => 'Hoàng Đức Thiện',
            'birthday' => '2001-07-27',
            'address' => 'Trâu Quỳ, Gia Lâm, Hà Nội',
            'phone' => '0386832065',
            'email' => 'quatbathien123@gmail.com',
            'position' => 2,
        ],
        [
            'fullname' => 'Nguyễn Thị Hạnh',
            'birthday' => '2001-03-16',
            'address' => 'Đặng xá, Gia Lâm, Hà Nội',
            'phone' => '0338248401',
            'email' => 'guenhain.163@gmail.com',
            'position' => 1,
        ],
        [
            'fullname' => 'Lê Thị Hà ',
            'birthday' => '2001-05-25',
            'address' => 'Định Công, Hoàng Mai, Hà Nội',
            'phone' => '0388666028',
            'email' => 'leha25052001@gmail.com',
            'position' => 4,
        ],
        [
            'fullname' => 'Lê Thanh Giang',
            'birthday' => '2001-03-08',
            'address' => 'Từ Sơn, Bắc Ninh',
            'phone' => '0399672001',
            'email' => 'giangle602@gmail.com',
            'position' => 6,
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->staffs as $staff){
            Staff::create($staff);
        }
    }
}
