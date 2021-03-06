<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\BiodataRequest as StoreRequest;
use App\Http\Requests\BiodataRequest as UpdateRequest;

/**
 * Class BiodataCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class BiodataCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Biodata');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/biodata');
        $this->crud->setEntityNameStrings('biodata', 'biodatas');

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
        $this->crud->addField([
            'name' => 'birth_of_date',
            'label' => 'Birth of Date',
            'type' => 'date_picker',
            'date_picker_options' => [
                'todayBtn' => true,
                'format' => 'dd-mm-yyyy',
                // 'language' => 'fr'
            ],
        ]); 


        $this->crud->setColumnDetails('user_id',
            [
                'label'=>'User',
                'type'=>'select',
                'name'=>'user_id',
                'entity'=>'user',
                'attribute'=>'name',
                'model'=>'App\Models\User'
            ]);

        // add asterisk for fields that are required in BiodataRequest
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
