<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CourseSeeder extends Seeder
{
    public function run()
    {
        DB::table('courses')->insert([
            ['title' => 'Course 1', 'description' => 'Description for Course 1', 'instructor_id' => 1],
            ['title' => 'Course 2', 'description' => 'Description for Course 2', 'instructor_id' => 2],
            // Add more course data with valid instructor IDs
        ]);
    }
}
