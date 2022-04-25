<?php

namespace App\Orchid\Screens\Project;

use Alert;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\Request as HttpRequest;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Request;

class ProjectCreateScreen extends Screen
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
        return "Project Create";
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make("Create")
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
                Input::make("title")
                    ->type("text")
                    ->required()
                    ->placeholder("project title")
                    ->title("title"),
                Input::make("link")
                    ->type("url")
                    ->placeholder("project link")
                    ->title("link")
                    ->required(),
                Select::make("type")
                    ->options([
                        "all" => "All",
                        "laravel" => "Laravel",
                        "spa" => "SPA",
                        "mobile" => "Mobile",
                    ])
                    ->title("project type")
                    ->required(),
                Input::make("img")
                    ->type("url")
                    ->title("project image")
                    ->placeholder("image")
                    ->required(),
                Input::make("download_url")
                    ->type("url")
                    ->title("Download Url")
                    ->placeholder("download url"),
                TextArea::make("shots")
                    ->rows(3)
                    ->title("Shots")
                    ->placeholder("shots"),
                TextArea::make("tags")
                    ->rows(3)
                    ->title("Tags")
                    ->placeholder("tags"),
            ]),
        ];
    }

    public function save(HttpRequest $request)
    {
        $req = $request->validate([
            "title" => "required|string|max:255",
            "link" => "required|url|max:255",
            "type" => "required|in:all,laravel,spa,mobile",
            "img" => "required|url|max:255",
            "download_url" => "nullable|url|max:255",
            "shots" => "nullable|string|max:255",
            "tags" => "nullable|string|max:255",
        ]);

        if (Project::create($req)) {
            Alert::success("project created successfully");
            return;
        }

        Alert::error("an error occured");
    }
}
