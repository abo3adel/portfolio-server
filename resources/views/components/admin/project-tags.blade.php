<div>
    @foreach ($arr as $str)
        <span class="p-1 m-1 bg-primary @if($block) d-block @endif" style="border-radius: 6px">
            {{$str}}
        </span>
    @endforeach
</div>