<?php

namespace App\Orchid\Screens\Post;

use Alert;
use App\Models\Category;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Illuminate\Http\Request;

class CreateScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return "Create Post";
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make("create post")
                ->icon("plus")
                ->type(Color::PRIMARY())
                ->method("save"),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Relation::make("category")
                    ->title("Category")
                    ->help("enter category slug")
                    ->fromModel(Category::class, "title", "slug"),

                Input::make("title")
                    ->title("Title")
                    ->placeholder("Post Title")
                    ->required()
                    ->type("text"),

                Input::make("img")
                    ->title("Image")
                    ->placeholder("Post Image")
                    ->required()
                    ->type("url"),

                Quill::make("body")
                    ->title("Content")
                    ->required()
                    ->placeholder("Insert text here ...")
                    ->help("Add the content for the post"),
            ]),
        ];
    }

    public function save(Request $request)
    {
        $req = (object) $request->validate([
            "category" => "required|string",
            "title" => "required|string|max:255",
            "img" => "required|url",
            "body" => "required",
        ]);

        $cat = Category::whereSlug($req->category)->firstOrFail();

        $saved = $cat->posts()->create([
            "title" => $req->title,
            "img" => $req->img,
            "body" => $req->body,
        ]);

        if ($saved) {
            Alert::success("post created Successfully");
        }
    }
}
