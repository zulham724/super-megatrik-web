<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ServiceRequest as StoreRequest;
use App\Http\Requests\ServiceRequest as UpdateRequest;

/**
 * Class ServiceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ServiceCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Service');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/service');
        $this->crud->setEntityNameStrings('service', 'services');

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
                "label"=>"Order id",
                "type"=>"select",
                "name"=>"order_id",
                "entity"=>"order",
                "attribute"=>"id",
                "model"=>"App\Models\Order"
            ]);
        $this->crud->addField([
            "label"=>"Service List id",
            "type"=>"select",
            "name"=>"service_list_id",
            "entity"=>"servicelist",
            "attribute"=>"name",
            "model"=>"App\Models\Servicelist"
        ]); 
        $this->crud->setColumnDetails('service_list_id',
            [
                "label"=>"Service Category id",
                "type"=>"select",
                "name"=>"service_list_id",
                "entity"=>"servicelist",
                "attribute"=>"name",
                "model"=>"App\Models\Servicelist"
            ]);

        // add asterisk for fields that are required in ServiceRequest
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
