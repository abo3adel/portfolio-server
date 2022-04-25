<?php

namespace App\Orchid\Screens\Mail;

use App\Models\Mail;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Screen;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;

class MailIndexScreen extends Screen
{
    public Mail $mail;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            "mails" => Mail::all(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return "Mail Index";
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
            Layout::modal('mail_modal', [
                Layout::view('components.admin.mail.modal', [
                    // 'mail' => $this->mail,
                ])
            ]),
            Layout::table("mails", [
                TD::make("id")->render(
                    fn($mail) => ModalToggle::make("#" . $mail->id)
                        ->modal("mail_modal")
                        ->method("showMail", [$mail])
                        ->icon('full-screen')
                        ->type(Color::PRIMARY())
                ),
                TD::make("name"),
                TD::make("email"),
                TD::make("created_at")->render(
                    fn(Mail $mail) => $mail->created_at->diffForHumans()
                ),
            ]),
        ];
    }

    public function showMail(Mail $mail)
    {
        $this->mail = $mail;
    }
}
