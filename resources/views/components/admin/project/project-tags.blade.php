<div>
    @foreach ($tags as $tag)
        <span class="p-1 m-1 bg-primary" style="border-radius: 6px">
            {{$tag}}
        </span>
    @endforeach
</div>