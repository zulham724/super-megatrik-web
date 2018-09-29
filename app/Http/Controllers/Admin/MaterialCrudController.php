<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\MaterialRequest as StoreRequest;
use App\Http\Requests\MaterialRequest as UpdateRequest;

/**
 * Class MaterialCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class MaterialCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Material');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/material');
        $this->crud->setEntityNameStrings('material', 'materials');

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
            "label"=>"Material List id",
            "type"=>"select",
            "name"=>"material_list_id",
            "entity"=>"materiallist",
            "attribute"=>"name",
            "model"=>"App\Models\Materiallist"
        ]); 
        $this->crud->setColumnDetails('material_list_id',
            [
                "label"=>"Material List id",
                "type"=>"select",
                "name"=>"material_list_id",
                "entity"=>"materiallist",
                "attribute"=>"name",
                "model"=>"App\Models\Materiallist"
            ]);

        // add asterisk for fields that are required in MaterialRequest
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
