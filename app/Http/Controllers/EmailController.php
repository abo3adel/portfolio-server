<?php

namespace App\Http\Controllers;

use App\Mail\UserMessage;
use App\Models\Mail as ModelsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send()
    {
        $req = (object) request()->validate([
            "name" => "required|string",
            "email" => "required|email",
            "message" => "required|string",
        ]);

        // save mail
        $saved = ModelsMail::create([
            'name' => $req->name,
            'email' => $req->email,
            'message' => $req->message,
        ]);

        Mail::to("abo3adel35@gmail.com")->send(
            new UserMessage($req->name, $req->email, $req->message)
        );

        return response()->json(['done' => $saved]);
    }
}
