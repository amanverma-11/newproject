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

//Users Registration and Login
Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function(){
    //Form to submit the question
    Route::get('/question/create', [QuestionController::class, 'showQuestionForm'])->name('question.form');
    //Store the question in the database
    Route::post('/question/create', [QuestionController::class, 'createQuestion'])->name('question.create');
    //Show quizzes
    Route::get('/quizzes', [QuizController::class, 'showQuizzes'])->name('quizzes.show');
    // Show a single quiz page 
    Route::get('/quiz/{id}', [QuizController::class, 'showQuiz'])->name('quiz.show');
    // Submitting the quiz
    Route::post('/submit-quiz', [QuizController::class, 'submitQuiz'])->name('quiz.submit');
});





