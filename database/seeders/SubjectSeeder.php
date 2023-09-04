<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('subjects')->insert([
                'subject_name' => '歴史',
                'school_id' => '1',
                'campus_id' =>'1',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
