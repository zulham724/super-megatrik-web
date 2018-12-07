<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ordernotcompleted($id){
        $driver = User::
        with('technician_orders.customer')
        ->with(['technician_orders.order_status'=>function($query){
            $query->where('is_completed',0);
        }])
        ->whereHas('technician_orders.order_status',function($query){
           $query->where('is_completed',0); 
        })
        ->find($id);

        return response()->json($driver);
    }

    public function ordercompleted($id){
        $driver = User::
        with('technician_orders.customer')
        ->with(['technician_orders.order_status'=>function($query){
            $query->where('is_completed',1);
        }])
        ->whereHas('technician_orders.order_status',function($query){
           $query->where('is_completed',1); 
        })
        ->find($id);

        return response()->json($driver);
    }

}
