<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LawRequest;
use App\Models\Law;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class LawCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;


    public function setup()
    {
        CRUD::setModel(Law::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/law');
        CRUD::setEntityNameStrings('law', 'laws');
    }


    protected function setupListOperation()
    {
        CRUD::column('id');
        CRUD::addColumn([
            'name' => 'title',
            'label' => 'Title (Uz)',
            'type' => 'text',
            'value' => function ($entry) {
                return $entry->title['uz'] ?? '-';
            }
        ]);
        CRUD::addColumn([
            'name' => 'description',
            'label' => 'Description (Uz)',
            'type' => 'text',
            'value' => function ($entry) {
                return $entry->description['uz'] ?? '-';
            }
        ]);
        CRUD::column('link');

    }


    protected function setupCreateOperation()
    {
        CRUD::setValidation(LawRequest::class);

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
                ['name' => 'uz', 'label' => 'Uzbek', 'type' => 'text'],
                ['name' => 'ru', 'label' => 'Russian', 'type' => 'text'],
                ['name' => 'en', 'label' => 'English', 'type' => 'text'],
            ]
        ]);

        CRUD::field('link');

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
