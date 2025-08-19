<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController as Controller;
use App\Http\Requests\Admin\StaticPageRequest;
use App\Models\FrontendPage;
use App\Traits\ResourceTrait;
use App\Traits\AdminStaticPageTrait;
use Illuminate\Support\Facades\File;

class StaticPageController extends Controller
{
    use ResourceTrait;
    use AdminStaticPageTrait;


    public function __construct()
    {
        parent::__construct();

        $this->model = new FrontendPage;
        $this->route .= '.static-pages';
        $this->views .= '.static_pages';

        $this->permissions = ['list'=>'static_pages_listing', 'create'=>'static_pages_adding', 'edit'=>'static_pages_editing', 'delete'=>''];
        $this->resourceConstruct();

    }

    protected function getCollection() {
        return $this->model->select('id', 'slug', 'name', 'title', 'updated_at');
    }

    protected function setDTData($collection) {
        return $this->initDTData($collection)
            ->rawColumns(['action_edit', 'action_delete', 'status']);
    }

    protected function getSearchSettings(){}



    public function store(StaticPageRequest $request)
    {
        $request->validated();
        $data = request()->all();
        $slug = $data['slug'];

        $this->createBladeView($slug);

        return $this->_store($data);
    }

    public function update(StaticPageRequest $request)
    {
        $request->validated();
    	$data = request()->all();
    	$id = decrypt($data['id']);
        if(!empty($data['content'])){
            $data['content'] = json_encode($data['content']);
        }
        return $this->_update($id, $data);
    }


}
