<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\StudentSeeder;
use Database\Seeders\CourseSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(StudentSeeder::class);
       $this->call(CourseSeeder::class);
    }
}
