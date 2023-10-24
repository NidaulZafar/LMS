<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Inertia\Inertia;
use Inertia\Response;


class CourseController extends Controller
{

    public function index(): Response
    {
        $courses = Course::all();

        return Inertia::render('Courses', [
            'courses' => $courses,
        ]);
    }



    public function show($course)
    {
        // Define the logic to show the details of a specific course
    }

    public function create()
    {
        // Define the logic for creating a new course
    }

    public function store(Request $request)
    {
        // Define the logic to store a new course
    }

    public function edit($course)
    {
        // Define the logic for editing an existing course
    }

    public function update(Request $request, $course)
    {
        // Define the logic to update an existing course
    }

    public function destroy($course)
    {
        // Define the logic to delete a course
    }
}
