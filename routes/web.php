<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');


// Dashboard (only accessible to authenticated and verified users)
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


// Profile routes (protected by 'auth' middleware)

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Routes for student actions (protected by student middleware)
Route::middleware(['auth', 'student'])->group(function () {
//    Route::get('/courses', [CourseController::class, 'index']);
//    Route::get('/courses/{course}', [CourseController::class, 'show']);
//    Route::get('/lessons/{lesson}', [LessonController::class, 'show']);
});

// Routes for instructor actions (protected by instructor middleware)
Route::middleware(['auth', 'instructor'])->group(function () {
    Route::get('/courses/create', [CourseController::class, 'create']);
    Route::post('/courses', [CourseController::class, 'store']);
    Route::get('/courses/{course}/edit', [CourseController::class, 'edit']);
    Route::put('/courses/{course}', [CourseController::class, 'update']);
    Route::delete('/courses/{course}', [CourseController::class, 'destroy']);
    // Other instructor routes
});

// Routes for admin actions (protected by admin middleware)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/users', [ProfileController::class, 'index']);
    Route::get('/users/{user}', [ProfileController::class, 'show']);
    Route::get('/users/{user}/edit', [ProfileController::class, 'edit']);
    Route::put('/users/{user}', [ProfileController::class, 'update']);
    // Other admin routes
});






require __DIR__.'/auth.php';



