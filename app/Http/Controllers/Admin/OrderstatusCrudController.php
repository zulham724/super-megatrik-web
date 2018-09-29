<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\OrderstatusRequest as StoreRequest;
use App\Http\Requests\OrderstatusRequest as UpdateRequest;

/**
 * Class OrderstatusCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class OrderstatusCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Orderstatus');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/orderstatus');
        $this->crud->setEntityNameStrings('orderstatus', 'orderstatuses');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();
        $this->crud->addField([
            "label"=>"Order id",
            "type"=>"select",
            "name"=>"order_id",
            "entity"=>"order",
            "attribute"=>"id",
            "model"=>"App\Models\Order"
        ]); 
        $this->crud->setColumnDetails('order_id',
            [
                'label'=>'Order',
                'type'=>'select',
                'name'=>'order_id',
                'entity'=>'order',
                'attribute'=>'id',
                'model'=>'App\Models\Order'
            ]);
        $this->crud->addField([
            'name'        => 'is_accepted', // the name of the db column
            'label'       => 'Diterima', // the input label
            'type'        => 'radio',
            'options'     => [ // the key will be stored in the db, the value will be shown as label; 
                                0 => "Belum Diterima",
                                1 => "Diterima"
                            ],
            'inline'      => true, 
        ]);
        $this->crud->setColumnDetails('is_accepted',
            [
                'name'        => 'is_accepted', // the name of the db column
                'label'       => 'Diterima', // the input label
                'type'        => 'radio',
                'options'     => [ // the key will be stored in the db, the value will be shown as label; 
                                    0 => "Belum Diterima",
                                    1 => "Diterima"
                                ],
            ]);
        $this->crud->addField([
            'name'        => 'is_completed', // the name of the db column
            'label'       => 'Status', // the input label
            'type'        => 'radio',
            'options'     => [ // the key will be stored in the db, the value will be shown as label; 
                                0 => "Belum Selesai",
                                1 => "Selesai"
                            ],
            'inline'      => true, 
        ]);
        $this->crud->setColumnDetails('is_completed',
            [
                'name'        => 'is_completed', // the name of the db column
                'label'       => 'Status', // the input label
                'type'        => 'radio',
                'options'     => [ // the key will be stored in the db, the value will be shown as label; 
                                    0 => "Belum Selesai",
                                    1 => "Selesai"
                                ],
            ]);


        // add asterisk for fields that are required in OrderstatusRequest
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
