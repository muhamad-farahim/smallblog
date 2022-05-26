<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthenticationController;
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


// AUTH ROUTES

Route::any('/blogs/creates/', function () {
    return 'lol';
});
Route::any("//login/", [AuthenticationController::class, 'login'])->name('login')->middleware("guest");
Route::any("//signup/", [AuthenticationController::class, 'signup'])->name('signup')->middleware("guest");
Route::any("//logout/", [AuthenticationController::class, 'logout'])->name('logout')->middleware("auth");

// READ ROUTES
Route::get('/blogs', [BlogController::class, 'view_global'])->name("global_blogs");
Route::get('//my_blogs/', [BlogController::class, 'my_blogs'])->name("my_blogs")->middleware('auth');
Route::get('/blogs/{username}/', [BlogController::class, 'user_blogs'])->name("user_blogs")->where([
    "username" => "[a-zA-Z0-9]+"
]);
Route::get('/blogs/{username}/{blogid}/', [BlogController::class, 'specific_blog'])->name("specific_blog")->where([
    "username" => "[a-zA-Z0-9]+", "blogid" => "[0-9]+"
]);
Route::get('/', function () {

    return redirect(route('global_blogs'));
});



// CRUD ROUTE

Route::any('/my_blogs/create/', [BlogController::class, 'add_blog'])->name('add_blog')->middleware('auth');
Route::post('/my_blogs/delete/',[BlogController::class, 'delete_blog'])->name('delete_blog')->middleware('auth');
Route::any('/my_blogs/{id}/', [BlogController::class, 'update_blog'])->name('update_blog')->middleware('auth');