<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('times')->insert([
            [
                'time' => '1',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'time' => '2',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'time' => '3',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'time' => '4',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'time' => '5',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'time' => '6',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'time' => '7',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
