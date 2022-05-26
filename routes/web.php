<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Request;
// use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
// use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
// use Mcamara\LaravelLocalization\LaravelLocalization as LaravelLocalizationLaravelLocalization;

/*
|

,
        
        "spatie/laravel-sitemap": "^5.8",
        --------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// $localize = new LaravelLocalizationLaravelLocalization();

require __DIR__ . "/auth.php";

Route::group(['prefix' => 'admin'], function () {
    require __DIR__ . "/voyager.php";    
});

// Route::group(
//     [
// "prefix" => $localize->setLocale(),
// "middleware" => ["localeCookieRedirect", "localeSessionRedirect"],
// ],
// function () {
// app()->setLocale($localize->getCurrentLocale());
// Carbon::setLocale($localize->getCurrentLocale());

// Route::get("/dashboard", function () {
//     return view("dashboard");
// })
//     ->middleware(["auth"])
//     ->name("dashboard");

Route::get("/tutorials", [PostController::class, "index"])->name("tutorials");

Route::get("f", [PostController::class, "find"])->name("search");

Route::get("c/{category}", [CategoryController::class, "index"])
    ->whereAlpha("category")
    ->name("category.index");

Route::post("/subscribe", [HomeController::class, "subscribe"]);

Route::get("/verify-email/{id}/{hashed}", [
    HomeController::class,
    "verifyMail",
])->name("newsletter.verify");

Route::get("p/{post}", [PostController::class, "show"])->name("post.index");

Route::get("/", [HomeController::class, "index"])->name("home");
//     }
// );

// Route::fallback(function(Exception $exception, Request $request){
//     // dd(route('platform.index'), route('platform.login'));
//     return ;
// });

