<fieldset>
    @php
        $data = [
            [
                "heading" => "Banner Content",
                "fields" => [
                    ["type" => "text", "label" => "Title of the banner section", "key" => "s1_title"],
                    ["type" => "textarea", "label" => "Content of Banner", "key" => "s1_content"],
                    ["type" => "image", "label" => "Banner Image", "key" => "s1_media_id"],
                ]
            ],
            [
                "heading" => "About Section Content",
                "fields" => [
                    ["type" => "text", "label" => "Title of the banner section", "key" => "s2_title"],
                    ["type" => "textarea", "label" => "Content of Banner", "key" => "s2_content"],
                    ["type" => "image", "label" => "Banner Image", "key" => "s2_media_id"],
                ]
            ],
             [
                "heading" => "About Section Content",
                "fields" => [
                    ["type" => "text", "label" => "Title of the banner section", "key" => "s2_title"],
                    ["type" => "textarea", "label" => "Content of Banner", "key" => "s2_content"],
                    ["type" => "image", "label" => "Banner Image", "key" => "s2_media_id"],
                ]
            ]
        ];
    @endphp

    @foreach($data as $section)
        <h3>{{ $section['heading'] }}</h3>

        @foreach($section['fields'] as $field)
            @include("admin.static_pages._partials.inputs.{$field['type']}", [
                "label" => $field['label'],
                "key" => $field['key'],
                "value" => $obj->content[$field['key']] ?? ($field['type'] === 'image' ? null : '')
            ])
        @endforeach
    @endforeach
</fieldset>
