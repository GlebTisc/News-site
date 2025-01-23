<?php

use Illuminate\Support\Facades\Route;
use \App\Models\Category;
use App\Http\Controllers\NewsController;
use \App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('main', [
        'categories' => Category::all()->values(),
        'sliderNews' => Category::getAllNews()
    ]);
});
Route::get('/news/{news:id}', [NewsController::class, 'show']);

Route::middleware('guest')->group(function() {
    Route::get('/login', function() {
        return view('login');
    });
    Route::get('/signup', function () {
        return view('signup');
    });
    Route::post('/signup', [UserController::class, 'create']);
    Route::post('/login', [UserController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function() {
    Route::get('/logout', [UserController::class, 'destroy']);
    Route::post('/add', [UserController::class, 'add']);
    Route::get('/add', function() {
       return redirect('/');
    });
});
