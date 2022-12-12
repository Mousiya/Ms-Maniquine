<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=>'Casual Wears',
            'image'=>'Casual_Wears.jpg',
        ]);

        Category::create([
            'name'=>'Smart Casual Wears',
            'image'=>'Smart_Casual_Wears.jpg',
        ]);

        Category::create([
            'name'=>'Kids dresses',
            'image'=>'Kids_dress.jpg',
        ]);

        Category::create([
            'name'=>'Wedding dresses',
            'image'=>'Wedding_dresses.jpg',
        ]);

        Category::create([
            'name'=>'Party wears',
            'image'=>'Party_wears.jpg',
        ]);
    }
}
