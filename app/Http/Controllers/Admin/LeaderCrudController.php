<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LeaderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Leader;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;


class LeaderCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;


    public function setup()
    {
        CRUD::setModel(Leader::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/leader');
        CRUD::setEntityNameStrings('leader', 'leaders');
    }


    protected function setupListOperation()
    {
        CRUD::column('id');
        CRUD::addColumn([
            'name' => 'name',
            'label' => 'Name (Uz)',
            'type' => 'text',
            'value' => function ($entry) {
                return $entry->name['uz'] ?? '-';
            }
        ]);
        CRUD::addColumn([
            'name' => 'position',
            'label' => 'Position (Uz)',
            'type' => 'text',
            'value' => function ($entry) {
                return $entry->position['uz'] ?? '-';
            }
        ]);
        CRUD::column('image')->type('image')->label('Image');


    }


    protected function setupCreateOperation()
    {
        CRUD::setValidation(LeaderRequest::class);

        CRUD::addField([
            'name' => 'name',
            'label' => 'Name (Uz)',
            'type' => 'repeatable',
            'fields' => [
                ['name' => 'uz', 'label' => 'Uzbek', 'type' => 'text'],
                ['name' => 'ru', 'label' => 'Russian', 'type' => 'text'],
                ['name' => 'en', 'label' => 'English', 'type' => 'text'],
            ]
        ]);

        CRUD::addField([
            'name' => 'position',
            'label' => 'Position (Uz)',
            'type' => 'repeatable',
            'fields' => [
                ['name' => 'uz', 'label' => 'Uzbek', 'type' => 'text'],
                ['name' => 'ru', 'label' => 'Russian', 'type' => 'text'],
                ['name' => 'en', 'label' => 'English', 'type' => 'text'],
            ]
        ]);
        CRUD::addField([
            'name' => 'image',
            'label' => 'Image',
            'type' => 'image',
            'crop' => true,
            'disk' => 'public'
        ]);


    }


    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
