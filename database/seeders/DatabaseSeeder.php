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
        $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(DaySeeder::class);
        $this->call(TimeSeeder::class);
        $this->call(SchoolSeeder::class);
        $this->call(CampusSeeder::class);
        $this->call(ClassroomSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(EmptyRoomSeeder::class);
        $this->call(UserCommentSeeder::class);
        $this->call(UserCampusSeeder::class);
        $this->call(UserSchoolSeeder::class);
        $this->call(ReservationSeeder::class);
    }
}
