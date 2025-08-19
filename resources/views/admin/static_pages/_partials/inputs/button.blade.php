<div class="form-group col-md-12">
    <a href="{{ $href??'' }}" class="btn btn-primary" target="_blank">
        {{ $label }}
    </a>

    @if(isset($hidden_value))
        <input type="hidden"  name="content[{{$hidden_value['name']}}]" value="{{ $hidden_value['value'] }}">
    @endif
</div>

