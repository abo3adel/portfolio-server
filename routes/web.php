<?php

use App\Http\Controllers\PostController;
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

Route::group(["prefix" => LaravelLocalization::setLocale()], function () {
    Route::get("/dashboard", function () {
        return view("dashboard");
    })
        ->middleware(["auth"])
        ->name("dashboard");

    Route::get("/", [PostController::class, "index"])->name('news');
    Route::get("/tutorials", [PostController::class, "index"])->name('tutorials');

    require __DIR__ . "/auth.php";
});
