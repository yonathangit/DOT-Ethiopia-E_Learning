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
    //    \App\Models\User::factory(2)->create();
    //  $this->call(StudentSeeder::class);
     $this->call(CourseSeeder::class);
     $this->call(InstructorSeeder::class);
     $this->call(ModuleSeeder::class);
    }
}
