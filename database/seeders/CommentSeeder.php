<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DateTime;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
                'comment' => '自習中',
                'classroom_id' => '1',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
