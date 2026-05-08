<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/admin/login', function () {

    if(session()->has('admin'))
    {
        return redirect('/dashboard');
    }

    return view('login');
});

Route::post('/admin/login', [PostController::class, 'login']);

Route::get('/dashboard', function () {

    if(!session()->has('admin'))
    {
        return redirect('/admin/login');
    }

    return app()->call([App\Http\Controllers\PostController::class, 'index']);
});

Route::post('/add-post', [PostController::class, 'store']);
Route::get('/delete-post/{id}', [PostController::class, 'delete']);
Route::get('/edit-post/{id}', [PostController::class, 'edit']);
Route::post('/update-post/{id}', [PostController::class, 'update']);
Route::get('/filter-posts', [PostController::class, 'filter']);
Route::get('/blog/{id}', [PostController::class, 'show']);
Route::get('/filter-date', [PostController::class, 'filterDate']);
Route::get('/search-posts', [PostController::class, 'search']);
Route::get('/logout', [PostController::class, 'logout']);