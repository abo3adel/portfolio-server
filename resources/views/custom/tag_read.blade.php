<ul class="" style="list-style-type: none;margin: 0;padding: 0;overflow: hidden;">
@foreach (explode(',', $dataTypeContent->{$row->field}) as $tag)
    
        <li class="bg-info" style="padding: 3px 5px;border-radius: 6px;margin: 4px 2px;text-align: center;display: inline-block;">
            <span style="display: block;">
                {{$tag}}
            </span>
        </li>    
@endforeach
</ul>