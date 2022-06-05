<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Screen\AsSource;
use Str;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
    use AsSource;

    protected $guarded = [];

    protected $appends = ["updated_diff", "body_mini"];

    public function sluggable(): array
    {
        return [
            "slug" => [
                "source" => "title",
            ],
        ];
    }

    protected function updatedDiff(): Attribute
    {
        return new Attribute(get: fn() => $this->updated_at->format("d M Y"));
    }

    protected function bodyMini(): Attribute
    {
        return new Attribute(get: fn() => Str::limit($this->body, 150));
    }

    public function getRouteKeyName(): string
    {
        return "slug";
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
