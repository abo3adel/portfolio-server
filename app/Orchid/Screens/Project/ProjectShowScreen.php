<?php

namespace App\Orchid\Screens\Project;

use App\Models\Project;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Screen;
use Orchid\Screen\Sight;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;

class ProjectShowScreen extends Screen
{
    public Project $project;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Project $project): iterable
    {
        return [
            "project" => $project,
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return "Project Show";
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make("Edit")
                ->icon("note")
                ->route("admin.project.edit", [
                    "project" => $this->project->slug,
                ])
                ->type(Color::INFO()),
            // Button::make("Remove")
            //     ->icon("trash")
            //     ->method("remove")
            //     ->type(Color::DANGER()),
            ModalToggle::make("project shots")
                ->modal("shots")
                ->method("getShots")
                ->icon("full-screen")
                ->type(Color::PRIMARY()),
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
            // modal first
            Layout::modal("shots", [
                Layout::view("components.admin.project.modal"),
            ]),
            Layout::legend("project", [
                Sight::make("id"),
                Sight::make("img")->render(fn (Project $project) => "<img src='{$project->img}' style='max-width: 100%' />"),
                Sight::make("title"),
                Sight::make("link")->render(function (Project $project) {
                    return Group::make([
                        $project->link,
                        Link::make("open")
                            ->icon("link")
                            ->type(Color::SUCCESS())
                            ->href($project->link)
                            ->target("_blank"),
                    ]);
                }),
                Sight::make("type")->render(
                    fn(Project $project) => Button::make($project->type)->type(
                        Color::INFO()
                    )
                ),
                Sight::make("download_url")
                    ->render(function (Project $project) {
                        return Group::make([
                            $project->download_url,
                            Link::make("dwonload")
                                ->icon("save")
                                ->type(Color::SUCCESS())
                                ->href($project->download_url ?? "")
                                ->target("_blank"),
                        ]);
                    })
                    ->canSee((bool) $this->project->download_url),
                Sight::make("tags")->render(
                    fn(Project $project) => view(
                        "components.admin.project.project-tags",
                        ["tags" => $project->tags]
                    )
                ),
            ]),
        ];
    }

    public function getShots()
    {
        // nothing
    }
}
