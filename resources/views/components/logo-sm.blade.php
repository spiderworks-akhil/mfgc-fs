<img src="{{ $logo_sm ? asset($logo_sm) : '' }}" height="100%" />
@if(!$logo_sm)
    <span style="font-size: 18px;font-weight:500">{{ env('APP_NAME') }}</span>
@endif
