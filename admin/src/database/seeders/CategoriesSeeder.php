<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create([
            'name' => 'Cà phê'
        ]);

        Category::create([
            'name' => 'Trà'
        ]);

        Category::create([
            'name' => 'Bánh ngọt'
        ]);
    }
}
