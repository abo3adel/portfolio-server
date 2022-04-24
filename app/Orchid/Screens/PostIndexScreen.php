<?php

namespace App\Orchid\Screens;

use App\Models\Post;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Color;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Request;

class PostIndexScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            "posts" => Post::with("category")->paginate(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return "All Posts";
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table("posts", [
                TD::make("id")
                    ->sort()
                    ->render(
                        fn(Post $post) => view(
                            "components.admin.post.index-id",
                            compact("post")
                        )
                    ),
                TD::make("title")->sort(),
                TD::make("category")->render(
                    fn(Post $post) => Link::make($post->category->title)->route(
                        "admin.category.show",
                        $post->category->slug
                    )
                ),
                TD::make("#")->render(function (Post $post) {
                    return Group::make([
                        Link::make("show")
                            ->icon("full-screen")
                            ->route("post.index", compact("post"))
                            ->type(Color::PRIMARY()),

                        Link::make("edit")
                            ->icon("pencil")
                            ->route("admin.post.edit", compact("post"))
                            ->type(Color::INFO()),
                        Button::make("remove")
                            ->icon("trash")
                            ->method("destroy", ["post" => $post->slug])
                            ->type(Color::DANGER()),
                    ]);
                }),
            ]),
        ];
    }

    public function destroy(Request $request, Post $post)
    {
        $post->deleteOrFail();

        Alert::success("Post was DELETED successfully");
    }
}
