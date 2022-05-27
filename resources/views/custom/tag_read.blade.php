<ul class="" style="list-style-type: none;margin: 0;padding: 0;overflow: hidden;">
@foreach (explode(',', $dataTypeContent->{$row->field}) as $tag)
    @if ($row->field === 'shots')
        <div class="" style="width: 30%;display: inline-block; margin: 5px;border-radius: 6px;">
            <img src="{{$tag}}" style="max-width: 100%;height: auto;" class="img-fluid" alt="shot" />
        </div>
    @else
        <li class="bg-info" style="padding: 3px 5px;border-radius: 6px;margin: 4px 2px;text-align: center;display: inline-block;">
            <span style="display: block;">
                {{$tag}}
            </span>
        </li>    
        @endif
@endforeach
</ul>