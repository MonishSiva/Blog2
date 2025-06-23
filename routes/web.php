<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/blogs', [BlogController::class, 'allBlogs'])->name('blog.all');





Route::put('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');

Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
Route::delete('/blog/delete/{id}', [BlogController::class, 'destroy'])->name('blog.delete');


Route::put('/blogs/update/{id}', [BlogController::class, 'update'])->name('blog.update');
