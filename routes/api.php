<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('/clients','API\ClientController');

Route::resource('/oauthclients', 'API\OauthClientController');
Route::post('register','API\UserController@store');

Route::group(['middleware'=>'auth:api','namespace'=>'API'],function(){

	Route::get('users/{id}/{relation}','UserController@show');

	// Route::get('roles/{id}/{relation}/$filter','UserController@show');

	Route::apiResources([
		"users"=>"UserController",
		"roles"=>"RoleController",
		"biodatas"=>"BiodataController",
		"cities"=>"CityController",
		"districts"=>"DistrictController",
		"locations"=>"LocationController",
		"materials"=>"MaterialController",
		"materialcategories"=>"MaterialcategoryController",
		"materiallists"=>"MateriallistController",
		"orders"=>"OrderController",
		"orderstatuses"=>"OrderstatusController",
		"services"=>"ServiceController",
		"servicecategories"=>"ServicecategoryController",
		"servicelists"=>"ServicelistController",
		"states"=>"StateController",
		"statuses"=>"StatusController",
		"transactions"=>"TransactionController",
		"transactionstatuses"=>"TransactionstatusController",
		"userstates"=>"UserstateController",
		"userstatuses"=>"UserstatusController",
		"contents"=>"ContentController",
		"contentcategories"=>"ContentcategoryController",
		"contentlists"=>"ContentlistController",

	]);

	Route::get('drivers/{id}/ordernotcompleted','UserController@drivers');
});
