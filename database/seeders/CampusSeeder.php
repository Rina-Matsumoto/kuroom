<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DateTime;
use Illuminate\Support\Facades\DB;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('campuses')->insert([
                'campus' => '角間キャンパス',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
