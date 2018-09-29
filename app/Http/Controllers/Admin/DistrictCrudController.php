<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\DistrictRequest as StoreRequest;
use App\Http\Requests\DistrictRequest as UpdateRequest;

/**
 * Class DistrictCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class DistrictCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\District');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/district');
        $this->crud->setEntityNameStrings('district', 'districts');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();
        $this->crud->addField([
            "label"=>"City id",
            "type"=>"select",
            "name"=>"city_id",
            "entity"=>"city",
            "attribute"=>"name",
            "model"=>"App\Models\City"
        ]);
        $this->crud->addField([
            'name' => 'description',
            'label' => 'Description',
            'type' => 'textarea'
        ]);


        $this->crud->setColumnDetails('city_id',
            [
                'label'=>'City Name',
                'type'=>'select',
                'name'=>'city_id',
                'entity'=>'city',
                'attribute'=>'name',
                'model'=>'App\Models\City'
            ]);

        // add asterisk for fields that are required in DistrictRequest
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
