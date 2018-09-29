<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\OrderRequest as StoreRequest;
use App\Http\Requests\OrderRequest as UpdateRequest;

/**
 * Class OrderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class OrderCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Order');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/order');
        $this->crud->setEntityNameStrings('order', 'orders');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();
        $this->crud->addField([
            "label"=>"Technician id",
            "type"=>"select",
            "name"=>"technician_id",
            "entity"=>"technician",
            "attribute"=>"name",
            "model"=>"App\Models\User"
        ]); 
        $this->crud->setColumnDetails('technician_id',
            [
                "label"=>"Technician id",
                "type"=>"select",
                "name"=>"technician_id",
                "entity"=>"technician",
                "attribute"=>"name",
                "model"=>"App\Models\User"
            ]);
        $this->crud->addField([
            "label"=>"Customer id",
            "type"=>"select",
            "name"=>"customer_id",
            "entity"=>"customer",
            "attribute"=>"name",
            "model"=>"App\Models\User"
        ]); 
        $this->crud->setColumnDetails('customer_id',
            [
                "label"=>"Customer id",
                "type"=>"select",
                "name"=>"customer_id",
                "entity"=>"customer",
                "attribute"=>"name",
                "model"=>"App\Models\User"
            ]);
        $this->crud->addField([
            'name' => 'order_start',
            'label' => 'Order Start',
            'type' => 'date_picker',
            'date_picker_options' => [
                'todayBtn' => true,
                'format' => 'dd-mm-yyyy',
                // 'language' => 'fr'
            ],
        ]); 
        $this->crud->addField([
            'name' => 'order_end',
            'label' => 'Order End',
            'type' => 'date_picker',
            'date_picker_options' => [
                'todayBtn' => true,
                'format' => 'dd-mm-yyyy',
                // 'language' => 'fr'
            ],
        ]); 

        // add asterisk for fields that are required in OrderRequest
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
