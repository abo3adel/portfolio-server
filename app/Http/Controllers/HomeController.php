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
        ]);
    }
}
