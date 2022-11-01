<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomeCategory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HomeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HomeCategory::create([
            'select_categories'=>'1,2,3,4,5,6,7,8',
            'no_of_dresses'=>'4',
        ]);
    }
}
