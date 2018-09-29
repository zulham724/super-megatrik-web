<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\UserstateRequest as StoreRequest;
use App\Http\Requests\UserstateRequest as UpdateRequest;

/**
 * Class UserstateCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class UserstateCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Userstate');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/userstate');
        $this->crud->setEntityNameStrings('userstate', 'userstates');

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
                'label'=>'State id',
                'type'=>'select',
                'name'=>'state_id',
                'entity'=>'state',
                'attribute'=>'name',
                'model'=>'App\Models\State'
            ]);
        $this->crud->addField([
            'name'        => 'is_active', // the name of the db column
            'label'       => 'Status', // the input label
            'type'        => 'radio',
            'options'     => [ // the key will be stored in the db, the value will be shown as label; 
                                0 => "Tidak Aktif",
                                1 => "Aktif"
                            ],
            'inline'      => true, 
        ]);
        $this->crud->setColumnDetails('is_active',
            [
                'name'=> 'is_active', // the name of the db column
                'label'=> 'Status', // the input label
                'type'=> 'radio',
                'options'=> [ // the key will be stored in the db, the value will be shown as label; 
                               0 => "Tidak Aktif",
                               1 => "Aktif"
                            ],
            ]);

        // add asterisk for fields that are required in UserstateRequest
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
