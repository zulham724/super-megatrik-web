<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\LocationRequest as StoreRequest;
use App\Http\Requests\LocationRequest as UpdateRequest;

/**
 * Class LocationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class LocationCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Location');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/location');
        $this->crud->setEntityNameStrings('location', 'locations');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();
        $this->crud->addField([
            "label"=>"User id",
            "type"=>"select",
            "name"=>"user_id",
            "entity"=>"user",
            "attribute"=>"name",
            "model"=>"App\Models\User"
        ]); 
        $this->crud->setColumnDetails('user_id',
            [
                "label"=>"User id",
                "type"=>"select",
                "name"=>"user_id",
                "entity"=>"user",
                "attribute"=>"name",
                "model"=>"App\Models\User"
            ]);
        $this->crud->addField([
            "label"=>"State id",
            "type"=>"select",
            "name"=>"state_id",
            "entity"=>"state",
            "attribute"=>"name",
            "model"=>"App\Models\State"
        ]); 
        $this->crud->setColumnDetails('state_id',
            [
                "label"=>"State id",
                "type"=>"select",
                "name"=>"state_id",
                "entity"=>"state",
                "attribute"=>"name",
                "model"=>"App\Models\State"
            ]);
        $this->crud->addField([
            "label"=>"City id",
            "type"=>"select",
            "name"=>"city_id",
            "entity"=>"city",
            "attribute"=>"name",
            "model"=>"App\Models\City"
        ]); 
        $this->crud->setColumnDetails('city_id',
            [
                "label"=>"City id",
                "type"=>"select",
                "name"=>"city_id",
                "entity"=>"city",
                "attribute"=>"name",
                "model"=>"App\Models\City"
            ]);
        $this->crud->addField([
            "label"=>"District id",
            "type"=>"select",
            "name"=>"district_id",
            "entity"=>"district",
            "attribute"=>"name",
            "model"=>"App\Models\District"
        ]); 
        $this->crud->setColumnDetails('district_id',
            [
                "label"=>"District id",
                "type"=>"select",
                "name"=>"district_id",
                "entity"=>"district",
                "attribute"=>"name",
                "model"=>"App\Models\District"
            ]);



        // add asterisk for fields that are required in LocationRequest
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
