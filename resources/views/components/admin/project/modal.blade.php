<div>
    @foreach ($project->shots as $shot)
        <img class='' style='max-width: 100%;' src="{{$shot}}" />
    @endforeach
</div>