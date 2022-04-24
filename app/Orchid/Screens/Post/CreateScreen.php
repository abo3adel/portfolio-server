<?php

namespace App\Orchid\Screens\Post;

use Alert;
use App\Models\Category;
use App\Models\Post;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Fields\TextArea;

class CreateScreen extends Screen
{
    protected bool $isEdit = false;

    protected array $rules = [
        "title" => "required|string|max:255",
        "img" => "required|url",
        "body" => "required|string",
    ];

    /**
     * Query data.
     *
     * @return array
     */
    public function query(?string $post = null): iterable
    {
        if ($post) {
            $post = Post::whereSlug($post)->firstOrFail();
            $this->isEdit = true;
        }

        return [
            "title" => $post?->title,
            "img" => $post?->img,
            "body" => $post?->body,
        ];
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
            Button::make(($this->isEdit ? "Update" : "Create") . " post")
                ->icon("plus")
                ->type(Color::PRIMARY())
                ->method($this->isEdit ? "update" : "save"),
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
                    ->fromModel(Category::class, "title", "slug")
                    ->disabled($this->isEdit)
                    ->canSee(!$this->isEdit)
                    ->required(!$this->isEdit),

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

                TextArea::make("body")
                    ->title("Content")
                    ->rows(7)
                    ->required()
                    ->placeholder("Insert text here ...")
                    ->help("Add the content for the post"),
            ]),
        ];
    }

    public function save(Request $request)
    {
        $req = (object) $request->validate(
            [
                "category" => "required|string",
            ] + $this->rules
        );

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

    public function update(Request $request, Post $post)
    {
        $req = $request->validate($this->rules);

        $updated = $post->fill($req);

        if (!$updated) {
            Alert::error("an error occured");
            return;
        }

        Alert::success("post updated successfully");
    }
}
