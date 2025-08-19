<div class="form-group @if(isset($class)){{$class}}@else col-md-12 @endif">
    <label>{{$label}}</label>
    <input type="text" name="content[{{$key}}]" class="form-control"
           value="{{$value}}">
</div>
