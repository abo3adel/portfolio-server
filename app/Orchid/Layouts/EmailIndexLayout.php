<?php

namespace App\Orchid\Layouts;

use App\Models\Subscriber;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class EmailIndexLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = "subscribers";

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make("id")
                ->sort()
                ->render(fn(Subscriber $subscriber) => "#" . $subscriber->id),
            TD::make("email")->render(
                fn(Subscriber $subscriber) => view(
                    "components.admin.email.verified",
                    compact("subscriber")
                )
            )
        ];
    }
}
