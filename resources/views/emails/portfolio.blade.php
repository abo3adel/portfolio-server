@component('mail::message')
    # Portfolio Message

    @component('mail::panel')
        <p>
            <h3>Name: </h3> {{ $name }}
        </p>
    @endcomponent

    @component('mail::panel')
        <p><strong>Mail: </strong> {{ $email }}</p>
    @endcomponent

    {{ $message }}

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
