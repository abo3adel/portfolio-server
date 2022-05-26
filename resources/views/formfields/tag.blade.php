{{-- <input type="text" class="tags-input" id="{{$row->field}}" placeholder="add some tags" value="@if(isset($dataTypeContent->{$row->field})){{ old($row->field, $dataTypeContent->{$row->field}) }} @else{{old($row->field)}} @endif" /> --}}

<input class="tags-hidden" id="tag-hidden-{{$row->field}}" name="{{$row->field}}" type="text" data-name="{{ $row->display_name }}"
@if($row->required == 1) required @endif
placeholder="{{ isset($options->placeholder)? old($row->field, $options->placeholder): $row->display_name }}"
value="@if(isset($dataTypeContent->{$row->field})){{ old($row->field, $dataTypeContent->{$row->field}) }} @else{{old($row->field)}} @endif" />