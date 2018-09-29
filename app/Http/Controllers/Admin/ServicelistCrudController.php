<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ServicelistRequest as StoreRequest;
use App\Http\Requests\ServicelistRequest as UpdateRequest;

/**
 * Class ServicelistCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ServicelistCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Servicelist');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/servicelist');
        $this->crud->setEntityNameStrings('servicelist', 'servicelists');

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
            "label"=>"Service Category id",
            "type"=>"select",
            "name"=>"service_category_id",
            "entity"=>"servicecategory",
            "attribute"=>"name",
            "model"=>"App\Models\Servicecategory"
        ]); 
        $this->crud->setColumnDetails('service_category_id',
            [
                "label"=>"Service Category id",
                "type"=>"select",
                "name"=>"service_category_id",
                "entity"=>"servicecategory",
                "attribute"=>"name",
                "model"=>"App\Models\Servicecategory"
            ]);

        // add asterisk for fields that are required in ServicelistRequest
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
