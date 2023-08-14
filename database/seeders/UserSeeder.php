<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'name' => 'RM',
                'email' => 'ri0322@stu.kanazawa-u.ac.jp',
                'password' => 'ken371327',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
