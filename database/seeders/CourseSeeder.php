<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CourseSeeder extends Seeder
{
    public function run()
    {
        // Retrieve instructor IDs from the 'instructors' table
        $instructorIds = Instructor::pluck('id')->toArray();

        Course::factory()->count(50)->create([
            'instructor_id' => function () use ($instructorIds) {
                return array_rand($instructorIds);
            },
        ]);
    }
}
