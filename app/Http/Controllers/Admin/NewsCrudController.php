<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsRequest;
use App\Models\Category;
use App\Models\News;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;


class NewsCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    public function setup()
    {
        CRUD::setModel(News::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/news');
        CRUD::setEntityNameStrings('news', 'news list');
    }

    protected function setupListOperation()
    {
        CRUD::column('category_id')->type('select')->entity('category')->model(Category::class)->attribute('name->uz');
        CRUD::addColumn([
            'name' => 'title',
            'label' => 'Title (Uz)',
            'type' => 'text',
            'value' => function ($entry) {
                return $entry->title[0]['uz'] ?? '-';
            },
        ]);
        CRUD::addColumn(['name' => 'published', 'type' => 'boolean']);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(NewsRequest::class);

        CRUD::addField([
            'label' => "Category",
            'type' => 'select2',
            'name' => 'category_id',
            'entity' => 'category',
            'model' => Category::class,
            'attribute' => 'name_uz',
        ]);

        CRUD::addField([
            'name' => 'title',
            'label' => 'Title',
            'type' => 'repeatable',
            'fields' => [
                ['name' => 'uz', 'label' => 'Uzbek', 'type' => 'text'],
                ['name' => 'ru', 'label' => 'Russian', 'type' => 'text'],
                ['name' => 'en', 'label' => 'English', 'type' => 'text'],
            ]
        ]);

        CRUD::addField([
            'name' => 'description',
            'label' => 'Description',
            'type' => 'repeatable',
            'fields' => [
                ['name' => 'uz', 'label' => 'Uzbek', 'type' => 'textarea'],
                ['name' => 'ru', 'label' => 'Russian', 'type' => 'textarea'],
                ['name' => 'en', 'label' => 'English', 'type' => 'textarea'],
            ]
        ]);

        CRUD::addField([
            'name' => 'as',
            'type' => 'datetime_picker'
        ]);

        CRUD::addField([
            'name' => 'published',
            'type' => 'checkbox',
            'label' => 'Published',
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
