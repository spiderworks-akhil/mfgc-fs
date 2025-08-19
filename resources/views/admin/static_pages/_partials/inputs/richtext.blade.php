<div class="form-group @if(isset($class)){{$class}}@else col-md-12 @endif">
    <label>{{$label}}</label>
    <textarea name="content[{{$key}}]" class="form-control editor">
                      {{$value}}
    </textarea>
</div>
