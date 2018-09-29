<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\TransactionstatusRequest as StoreRequest;
use App\Http\Requests\TransactionstatusRequest as UpdateRequest;

/**
 * Class TransactionstatusCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class TransactionstatusCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Transactionstatus');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/transactionstatus');
        $this->crud->setEntityNameStrings('transactionstatus', 'transactionstatuses');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();
        $this->crud->addField([
            "label"=>"Transaction id",
            "type"=>"select",
            "name"=>"transaction_id",
            "entity"=>"transaction",
            "attribute"=>"id",
            "model"=>"App\Models\Transaction"
        ]); 
        $this->crud->setColumnDetails('transaction_id',
            [
                "label"=>"Transaction id",
                "type"=>"select",
                "name"=>"transaction_id",
                "entity"=>"transaction",
                "attribute"=>"id",
                "model"=>"App\Models\Transaction"
            ]);
        $this->crud->addField([
            'name'        => 'is_paid', // the name of the db column
            'label'       => 'Dibayar', // the input label
            'type'        => 'radio',
            'options'     => [ // the key will be stored in the db, the value will be shown as label; 
                                0 => "Belum Dibayar",
                                1 => "Dibayar"
                            ],
            'inline'      => true, 
        ]);
        $this->crud->setColumnDetails('is_paid',
            [
                'name'        => 'is_paid', // the name of the db column
                'label'       => 'Dibayar', // the input label
                'type'        => 'radio',
                'options'     => [ // the key will be stored in the db, the value will be shown as label; 
                                    0 => "Belum Dibayar",
                                    1 => "Dibayar"
                                ],
            ]);

        // add asterisk for fields that are required in TransactionstatusRequest
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
