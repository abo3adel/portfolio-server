<div
    class="p-1 rounded text-white" style="background-color:{{ $subscriber->email_verified_at ? 'rgb(59,130,246)' : 'rgb(220,38,38)'}};text-align:center;font-size: 1.2rem">
    <p title="{{$subscriber->email_verified_at}}">
        <i class="fas {{$subscriber->email_verified_at ? 'fa-check' : 'fa-times'}}"></i>{{ $subscriber->email }}
    </p>
</div>
