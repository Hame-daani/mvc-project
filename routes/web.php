<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\OptionController;

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
    // return view('welcome');
    return view('index');
});

Route::resource('books', BookController::class);
Route::get('quizzes', [QuizController::class, 'index'])->name('quizzes.index');
Route::post('quizzes/{quiz}/toggle', [QuizController::class, 'toggle'])->name('quizzes.toggle');
Route::post('quizzes/{quiz}/attempt', [QuizController::class, 'attempt'])->name('quizzes.attempt');
Route::resource('books.quizzes', QuizController::class)->shallow();
Route::resource('quizzes.questions', QuestionController::class)->shallow()->only(['store', 'update', 'destroy']);
Route::resource('questions.options', OptionController::class)->shallow()->only(['store', 'destroy']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
