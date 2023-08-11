<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DateTime;
use Illuminate\Support\Facades\DB;

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
                'remember_token' => '',
                'school_id' => '1',
                'campus_id' => '1',
                'comment_id' => '1',
                'reservation_id' =>'1',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
