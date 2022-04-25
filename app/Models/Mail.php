<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Mail extends Model
{
    use HasFactory;
    use AsSource;

    protected $fillable = ['name', 'email', 'message'];
}
