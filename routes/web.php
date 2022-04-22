<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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

    Route::get("/tutorials", [PostController::class, "index"])->name(
        "tutorials"
    );

    Route::get("f", [PostController::class, "find"])->name("search");

    Route::get("c/{category}", [CategoryController::class, "index"])
        ->whereAlpha("category")
        ->name("category.index");

    Route::get("/{post}", [PostController::class, "show"])
        ->name("post.index");

    Route::get("/", [HomeController::class, "index"])->name("home");
    require __DIR__ . "/auth.php";
});
