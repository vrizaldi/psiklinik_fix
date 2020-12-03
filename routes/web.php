<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Home\NewsController;
use App\Http\Controllers\Home\ConsultantController;
use App\Http\Controllers\MoodTrackController;

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

Route::middleware('guest')->group(function() {
    Route::get('/login', [LoginController::class, 'serve'])->name('auth.login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'serve'])->name('auth.register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::middleware('auth')->group(function() {
    Route::middleware('quized')->group(function() {
        Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');
        Route::get('/news', [NewsController::class, 'serve'])->name('home.news');
        Route::get('/news/{id}', [NewsController::class, 'showContent'])->name('home.news.post');
        Route::get('/consultants', [ConsultantController::class, 'serve'])->name('home.consultants');
        Route::get('/consultants/{email}', [ConsultantController::class, 'showConsultant'])->name('home.consultants.consult');
        Route::get('/track', [MoodTrackController::class, 'serve'])->name('home.track');
    });
    Route::get('/track/quiz', [MoodTrackController::class, 'showQuiz'])->name('home.track.quiz');
    Route::get('/track/quiz/submit', [MoodTrackController::class, 'answerQuiz'])->name('home.track.quiz.submit');
    Route::get('/', function () {
        return redirect()->route('home.news');
    })->name('home');
});
