<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DateTime;
use Illuminate\Support\Facades\DB;

class CommentedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('commented')->insert([
                'user_id' => '1',
                'comment_id' => '1',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
