<?php

namespace App\Models;

use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Orchid\Screen\AsSource;

class Subscriber extends Model
{
    use HasFactory;
    use Notifiable;
    use AsSource;

    protected $fillable = ['email', 'otp', 'email_verified_at'];

    public static function getVerifiationHash(string $email): string
    {
        return sha1($email);
    }

    public function getHashId(): string
    {
        return (new \Hashids\Hashids)->encode($this->id);
    }
}
