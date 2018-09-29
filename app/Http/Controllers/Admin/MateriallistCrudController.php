<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\MateriallistRequest as StoreRequest;
use App\Http\Requests\MateriallistRequest as UpdateRequest;

/**
 * Class MateriallistCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class MateriallistCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Materiallist');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/materiallist');
        $this->crud->setEntityNameStrings('materiallist', 'materiallists');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();
        $this->crud->addField([
            'name' => 'description',
            'label' => 'Description',
            'type' => 'textarea'
        ]);
        $this->crud->addField([
            "label"=>"Material Category id",
            "type"=>"select",
            "name"=>"material_category_id",
            "entity"=>"materialcategory",
            "attribute"=>"name",
            "model"=>"App\Models\Materialcategory"
        ]); 
        $this->crud->setColumnDetails('material_category_id',
            [
                "label"=>"Material Category id",
                "type"=>"select",
                "name"=>"material_category_id",
                "entity"=>"materialcategory",
                "attribute"=>"name",
                "model"=>"App\Models\Materialcategory"
            ]);

        // add asterisk for fields that are required in MateriallistRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
