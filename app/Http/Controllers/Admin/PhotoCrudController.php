<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PhotoRequest;
use App\Models\Photo;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;


class PhotoCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;


    public function setup()
    {
        CRUD::setModel(Photo::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/photo');
        CRUD::setEntityNameStrings('photo', 'photos');
    }


    protected function setupListOperation()
    {
        CRUD::column('id');
        CRUD::column('photo')->type('image')->label('Photo');

    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(PhotoRequest::class);

        CRUD::addField([
            'name' => 'photo',
            'label' => 'Photo',
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
