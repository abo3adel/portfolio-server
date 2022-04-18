<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getLatest()
    {
        return response()->json([
            "posts" => Post::with("category")
                ->limit(7)
                ->orderBy("created_at", "desc")
                ->get(),
        ]);
    }

    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("posts.index", [
            "posts" => Post::with("category")
                ->orderByDesc("id")
                ->paginate(),
        ]);
    }

    /**
     * Display a listing of the found posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function find()
    {
        ["q" => $q] = request()->validate([
            "q" => "required|string|min:2|max:255",
        ]);

        return view("posts.index", [
            "posts" => Post::with("category")
                ->where("title", "LIKE", "%$q%")
                ->orderByDesc("id")
                ->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created posts in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified posts.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified posts.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified posts in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified posts from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
