<?php

namespace App\Orchid\Screens\Project;

use Alert;
use App\Models\Project;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;

class ProjectCreateScreen extends Screen
{
    protected bool $isEdit = false;

    protected array $rules = [
        "title" => "required|string|max:255",
        "link" => "required|url|max:255",
        "type" => "required|in:all,laravel,spa,mobile",
        "img" => "required|url|max:255",
        "download_url" => "nullable|url|max:255",
        "shots" => "nullable|string|max:255",
        "tags" => "nullable|string|max:255",
    ];

    /**
     * Query data.
     *
     * @return array
     */
    public function query(?string $project = null): iterable
    {
        if ($project) {
            $project = Project::whereSlug($project)->firstOrFail();
            $this->isEdit = true;
        }

        return [
            "title" => $project?->title,
            "img" => $project?->img,
            "link" => $project?->link,
            "type" => $project?->type,
            "download_url" => $project?->download_url,
            "shots" => join(",", $project?->shots ?? []),
            "tags" => join(",", $project?->tags ?? []),
        ];
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
            Button::make(($this->isEdit ? "Update" : "Create") . " Project")
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

    public function save(Request $request)
    {
        $req = $request->validate($this->rules);

        if (Project::create($req)) {
            Alert::success("project created successfully");
            return;
        }

        Alert::error("an error occured, please try again later");
    }

    public function update(Request $request, Project $project)
    {
        $req = $request->validate($this->rules);
        $req['shots'] = explode(',', $req['shots']);
        $req['tags'] = explode(',', $req['tags']);

        if ($project->update($req)) {
            Alert::success("project updated successfully");
            return redirect()->route("admin.project.show", [
                "project" => $project->slug,
            ]);
        }
        Alert::error("an error occured, please try again later");
    }
}
