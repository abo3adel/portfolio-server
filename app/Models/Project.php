<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Project extends Model
{
    use HasFactory;
    use Sluggable;
    use AsSource, Filterable, Attachable;

    protected $guarded = [];

    protected $casts = [
        'shots' =>  'array',
        'tags' => 'array',
    ];

    public function sluggable(): array
    {
        return [
            "slug" => [
                "source" => "title",
            ],
        ];
    }

    public function getRouteKeyName(): string
    {
        return "slug";
    }
}
