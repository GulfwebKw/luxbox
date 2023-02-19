<label>{{$label}}</label>
<select @if(isset($multiple)&&$multiple==true) multiple @endif name="{{isset($multiple) && $multiple==true?$name . '[]':$name}}" class="form-control" @if(isset($required)) required @endif>
    @if(!isset($none))
                <option value="">None</option>
    @endif
    @foreach($resources as $resource)
        <option value="{{ isset($value)?$resource->$value:$resource->id }}" @if(isset($SelectedValue)) @if($resource->$SelectedValue == $foreign_key) selected @endif  @elseif($resource->id == $foreign_key) selected  @endif>
            {{$title?$resource->$title: $resource->title }}
        </option>
    @endforeach
</select>