<?php

namespace App\Http\Controllers;

use App;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use TCG\Voyager\VoyagerServiceProvider;

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
            "_category_view" => "sometimes|string",
        ]);

        $posts = Post::with("category:id,title,slug")
            ->where("title", "LIKE", "%" . $req->q . "%")
            // search within currently viewed category
            ->when(
                isset($req->_category_view),
                fn(Builder $q) => $q->whereRelation(
                    "category",
                    "slug",
                    $req->_category_view
                )
            )
            ->orderByDesc("id")
            ->paginate();

        return view("posts.index", compact("posts"));
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
        return view("posts.show", compact("post"));
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
