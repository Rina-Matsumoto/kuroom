<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SchoolSeeder::class,
            CampusSeeder::class,
            DaySeeder::class,
            ClassroomSeeder::class,
            EmptyRoomSeeder::class,
            ReservationSeeder::class,
            CommentSeeder::class,
            UserSeeder::class,
            ReservedSeeder::class,
            CommentedSeeder::class,
            
        ]);
    }
}
