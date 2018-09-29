<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\UserstatusRequest as StoreRequest;
use App\Http\Requests\UserstatusRequest as UpdateRequest;

/**
 * Class UserstatusCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class UserstatusCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Userstatus');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/userstatus');
        $this->crud->setEntityNameStrings('userstatus', 'User has statuses');

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
            "label"=>"Status",
            "type"=>"select",
            "name"=>"status_id",
            "entity"=>"status",
            "attribute"=>"name",
            "model"=>"App\Models\Status"
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


        $this->crud->setColumnDetails('user_id',
            [
                'label'=>'Username',
                'type'=>'select',
                'name'=>'user_id',
                'entity'=>'user',
                'attribute'=>'name',
                'model'=>'App\Models\User'
            ]);
        $this->crud->setColumnDetails('status_id',
            [
                "label"=>"Status",
                "type"=>"select",
                "name"=>"status_id",
                "entity"=>"status",
                "attribute"=>"name",
                "model"=>"App\Models\Status"
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

        // add asterisk for fields that are required in UserstatusRequest
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
