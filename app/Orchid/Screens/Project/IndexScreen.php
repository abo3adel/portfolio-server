<?php

namespace App\Orchid\Screens\Project;

use Alert;
use App\Models\Project;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;

class IndexScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            "projects" => Project::all(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return "all projects";
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
            Layout::table("projects", [
                TD::make("id")->render(
                    fn(Project $project) => "#" . $project->id
                ),
                TD::make("title")->render(
                    fn(Project $project) => Link::make($project->title)->route(
                        "admin.project.show",
                        [
                            "project" => $project->slug,
                        ]
                    )
                ),
                TD::make("link")->render(
                    fn(Project $project) => Link::make("Link")
                        ->type(Color::PRIMARY())
                        ->href($project->link)
                ),
                TD::make("type")->sort(),
                TD::make("options")->render(
                    fn(Project $project) => Group::make([
                        Link::make("Edit")
                            ->icon("pencil")
                            ->type(Color::INFO())
                            ->route("admin.project.edit", [
                                "project" => $project->slug,
                            ]),
                        Button::make("Delete")
                            ->icon("trash")
                            ->type(Color::DANGER())
                            ->method("destroy"),
                    ])
                ),
            ]),
        ];
    }

    public function destroy(Project $project)
    {
        $project->delete();

        Alert::success("Project DELETED successfully");
    }
}
