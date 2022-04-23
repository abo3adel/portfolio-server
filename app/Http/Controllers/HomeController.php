<?php

namespace App\Http\Controllers;

use App\Events\Subscriped;
use App\Models\Post;
use App\Models\Subscriber;
use App\Notifications\SendVerifyEmailToSubscriber;
use Hash;
use Illuminate\Http\Request;
use Route;

class HomeController extends Controller
{
    public function index()
    {
        return view("home", [
            "featured" => Post::with("category")
                ->inRandomOrder()
                ->limit(4)
                ->get(),
            "latestNews" => Post::with("category")
                ->whereCategoryId(1)
                ->orderByDesc("id")
                ->limit(6)
                ->get(),
            "latestTutorials" => Post::with("category")
                ->whereCategoryId(2)
                ->orderByDesc("id")
                ->limit(6)
                ->get(),
        ]);
    }

    public function subscribe()
    {
        ["email" => $email] = request()->validate([
            "email" => "required|email|unique:subscribers,email",
        ]);

        $subscriber = Subscriber::create([
            "email" => $email,
            "otp" => Subscriber::getVerifiationHash($email),
        ]);

        $subscriber->notify(new SendVerifyEmailToSubscriber());

        return response()->json([
            "done" => (bool) $subscriber,
        ]);
    }

    public function verifyMail(string $id, string $hashed)
    {
        abort_unless(request()->hasValidSignature(), 403);

        $subscriber = Subscriber::findOrFail(
            (new \Hashids\Hashids())->decode($id)[0]
        , ['email_verified_at', 'otp']);

        abort_unless($subscriber->otp === $hashed, 403);

        $subscriber->email_verified_at = now()->toDateTimeString();
        $subscriber->update();

        return view("newsletter.verify");
    }
}
