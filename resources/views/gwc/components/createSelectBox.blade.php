<label>{{$label}}</label>
<select id="{{isset($id)?$id:null}}" @if(isset($multiple)&&$multiple==true) multiple @endif name="{{isset($multiple) && $multiple==true?$name . '[]':$name}}" class="form-control" @if(isset($required)) required @endif>
        <option value="">None</option>
    @foreach($resources as $resource)
        <option value="{{ isset($value)?$resource->$value:$resource->id }}">{{ $resource->$title }}</option>
    @endforeach
</select>