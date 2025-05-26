<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;


class CategoryCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;


    public function setup()
    {
        CRUD::setModel(Category::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/category');
        CRUD::setEntityNameStrings('category', 'categories');
    }


    protected function setupListOperation(): void
    {

        CRUD::addColumn([
            'name' => 'name',
            'label' => 'Name (Uz)',
            'type' => 'text',
            'value' => function ($entry) {
                return $entry->name['uz'] ?? '-';
            }
        ]);
    }


    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(CategoryRequest::class);

        CRUD::addField([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'repeatable',
            'fields' => [
                ['name' => 'uz', 'label' => 'Uzbek', 'type' => 'text'],
                ['name' => 'ru', 'label' => 'Russian', 'type' => 'text'],
                ['name' => 'en', 'label' => 'English', 'type' => 'text'],
            ]
        ]);
    }


    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
