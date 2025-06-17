<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsImageRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsImage;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;


class NewsImageCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(NewsImage::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/news-image');
        CRUD::setEntityNameStrings('news image', 'news images');
    }


    protected function setupListOperation(): void
    {
        CRUD::column('news_id')->type('text');
        CRUD::column('image')->type('image');
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(NewsImageRequest::class);

        CRUD::addField([
            'label' => "News",
            'type' => 'select2',
            'name' => 'news_id',
            'entity' => 'news',
            'model' => News::class,
            'attribute' => 'title_uz',
        ]);

        CRUD::addField([
            'name' => 'image',
            'label' => 'Image',
            'type' => 'image',
            'crop' => true,
            'disk' => 'public'
        ]);
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }
}
