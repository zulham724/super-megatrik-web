<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ContentRequest as StoreRequest;
use App\Http\Requests\ContentRequest as UpdateRequest;

/**
 * Class ContentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ContentCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Content');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/content');
        $this->crud->setEntityNameStrings('content', 'contents');

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
            "label"=>"Content List id",
            "type"=>"select",
            "name"=>"content_list_id",
            "entity"=>"contentlist",
            "attribute"=>"name",
            "model"=>"App\Models\Contentlist"
        ]); 
        $this->crud->setColumnDetails('content_list_id',
            [
                "label"=>"Content List id",
                "type"=>"select",
                "name"=>"content_list_id",
                "entity"=>"contentlist",
                "attribute"=>"name",
                "model"=>"App\Models\Contentlist"
            ]);

        // add asterisk for fields that are required in ContentRequest
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
