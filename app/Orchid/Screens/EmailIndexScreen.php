<?php

namespace App\Orchid\Screens;

use App\Models\Subscriber;
use App\Orchid\Layouts\EmailIndexLayout;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;

class EmailIndexScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'subscribers' => Subscriber::all(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Subscribers Emails';
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
            EmailIndexLayout::class,
        ];
    }
}
