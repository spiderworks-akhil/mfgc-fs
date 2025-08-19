<div class="form-group image-holder @if(isset($class)){{$class}}@else col-md-12 @endif">
    @include('admin.media.set_file', [
        'file' => $value,
        'title' => $label,
        'popup_type' => 'single_image',
        'type' => 'Image',
        'holder_attr' => 'content['.$key.']',
        'id' => 'content_'.$key,
        'display' => 'horizontal'
    ])
</div>
