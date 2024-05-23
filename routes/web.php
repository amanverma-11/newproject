<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
    return Inertia::render("Home");
});

Route::get('/post/create', function () {
    return Inertia::render("CreatePost");
})->name('post.create');

Route::post('/post/create', [PostController::class, 'store'])->name('post.store');
Route::get('/posts', [PostController::class, 'index'])->name('posts.show');
Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');
Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('post.update');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('post.delete');

//Users
Route::get('/register', function () {
    return Inertia::render('Register');
});
Route::post('/register', [RegisterController::class, 'store'])->name('register');
Route::get('/login', function(){
    return Inertia::render('Login');
});
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Quiz
Route::get('/quiz', [QuizController::class, 'show'])->name('quiz.show');
Route::post('/submit-quiz', [QuizController::class, 'submitQuiz'])->name('quiz.submit');
Route::get('/questions/create', [QuestionController::class, 'create'])->name('question.create');
Route::post('/questions/create', [QuestionController::class, 'store']);



