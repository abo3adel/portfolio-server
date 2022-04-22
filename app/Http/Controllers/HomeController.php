<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view("home", [
            "featured" => Post::with("category")
                ->inRandomOrder()
                ->limit(4)
                ->get(),
            "latestNews" => Post::with('category')->whereCategoryId(1)
                ->orderByDesc("id")
                ->limit(6)
                ->get(),
            "latestTutorials" => Post::with('category')->whereCategoryId(2)
                ->orderByDesc("id")
                ->limit(6)
                ->get(),
        ]);
    }
}
