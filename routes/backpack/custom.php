<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    CRUD::resource('user', 'UserCrudController');
    CRUD::resource('role', 'RoleCrudController');
    CRUD::resource('biodata', 'BiodataCrudController');
    CRUD::resource('status', 'StatusCrudController');
    CRUD::resource('userstatus', 'UserstatusCrudController');
    CRUD::resource('city', 'CityCrudController');
    CRUD::resource('district', 'DistrictCrudController');
    CRUD::resource('state', 'StateCrudController');
    CRUD::resource('location', 'LocationCrudController');
    CRUD::resource('userstate', 'UserstateCrudController');
    CRUD::resource('orderstatus', 'OrderstatusCrudController');
    CRUD::resource('order', 'OrderCrudController');
    CRUD::resource('servicecategory', 'ServicecategoryCrudController');
    CRUD::resource('materialcategory', 'MaterialcategoryCrudController');
    CRUD::resource('servicelist', 'ServicelistCrudController');
    CRUD::resource('materiallist', 'MateriallistCrudController');
    CRUD::resource('service', 'ServiceCrudController');
    CRUD::resource('material', 'MaterialCrudController');
    CRUD::resource('transactionstatus', 'TransactionstatusCrudController');
    CRUD::resource('transaction', 'TransactionCrudController');
}); // this should be the absolute last line of this file