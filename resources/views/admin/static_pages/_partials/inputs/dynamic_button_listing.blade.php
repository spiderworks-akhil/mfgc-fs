@if(isset($dynamic_listing))
<div class="form-group col-md-12">
    <a href="{{ $dynamic_listing['href']??'' }}" class="btn btn-primary" target="_blank">
        {{ $label }}
    </a>

    @if(isset($dynamic_listing))
        <input type="hidden"  name="content[{{$dynamic_listing['name']}}]" value="{{ $dynamic_listing['value'] }}">
    @endif
</div>
@endif

