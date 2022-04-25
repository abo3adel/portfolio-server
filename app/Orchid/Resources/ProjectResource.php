<?php

namespace App\Orchid\Resources;

use App\Models\Project;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\RadioButtons;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class ProjectResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Project::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
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
                ->placeholder("shots")
                ->required(),
            TextArea::make("tags")
                ->rows(3)
                ->title("Tags")
                ->placeholder("tags")
                ->required(),
        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make("id")
                ->sort()
                ->render(
                    fn(Project $project) => view(
                        "components.admin.post.index-id",
                        ["post" => $project]
                    )
                ),

            TD::make("title")->sort(),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [Sight::make("id"), Sight::make("title"), Sight::make("img")];
    }

    // /**
    //  * Get the validation rules that apply to save/update.
    //  *
    //  * @return array
    //  */
    // public function rules(Project $project): array
    // {
    //     return [
    //         'title' => [
    //             'required',
    //             // Rule::unique(self::$model, 'slug')->ignore($model),
    //         ],
    //     ];
    // }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [
            new \Orchid\Crud\Filters\DefaultSorted('id', 'desc'),
        ];
    }
}
