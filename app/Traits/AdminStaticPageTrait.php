<?php

namespace App\Traits;
use Illuminate\Support\Facades\File;

trait AdminStaticPageTrait {

    public function createBladeView($slug)
    {
        $path = resource_path("views/admin/static_pages/_partials/$slug.blade.php");

        $sourcePath = resource_path('views/admin/static_pages/template.blade.php');

        $dir = dirname($path);
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        if (File::exists($sourcePath)) {
            $content = File::get($sourcePath);
        } else {
            $content = '';
        }

        if (File::exists($path)) {
            File::delete($path);
        }

        File::put($path, $content);
    }

}
