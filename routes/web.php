<?php

use App\Http\Controllers\LessonController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

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

Route::inertia('/', 'Index')->name('index');
Route::get('weather', WeatherController::class)->name('weather');
Route::group(['prefix' => 'lessons', 'as' => 'lessons.'], function () {
    Route::get('rating', [LessonController::class, 'rating'])->name('rating');
    Route::get('students-sort-by-viewed', [LessonController::class, 'studentsSortByViewed'])->name('students_sort_by_viewed');
    Route::get('lessons-sort-by-views', [LessonController::class, 'lessonsSortByViews'])->name('lessons_sort_by_views');

    Route::get('student-modal', [LessonController::class, 'studentModal'])->name('student_modal');
    Route::get('student-show/{user}', [LessonController::class, 'studentShow'])->name('student_show');
    Route::get('lesson-modal', [LessonController::class, 'lessonModal'])->name('lesson_modal');
    Route::get('lesson-show/{lesson}', [LessonController::class, 'lessonShow'])->name('lesson_show');
});
