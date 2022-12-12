<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'mousiya29@gmail.com',
            'utype'=>'ADM',
            'password'=>Hash::make('1234@admin'),
            'remember_token'=>Str::random(10),
        ]);

        $this -> call([CategorySeeder::class]);
        $this -> call([ServiceCategorySeeder::class]);
        $this -> call([HomeCategorySeeder::class]);
        $this -> call([SalesSeeder::class]);
    }
}
