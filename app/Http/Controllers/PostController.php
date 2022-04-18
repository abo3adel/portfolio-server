<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
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
        $req = (object) request()->validate([
            "q" => "required|string|min:2|max:255",
            "_category_view" => "sometimes|string"
        ]);

        $posts = Post::with("category")
            ->where("title", "LIKE", "%".$req->q."%");

        // search within currently viewed category
        if (isset($req->_category_view)) {
            $category = Category::whereSlug($req->_category_view)->firstOrFail();

            $posts->whereCategoryId($category->id);
        }

        return view("posts.index", [
            "posts" => $posts
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
