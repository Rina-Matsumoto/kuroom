<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days')->insert([
            [
                'day' => '月',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'day' => '火',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'day' => '水',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'day' => '木',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'day' => '金',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'day' => '土',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'day' => '日',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
