<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orderstatus;

class OrderstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderstatuses = Orderstatus::get();
        return response()->json($orderstatuses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orderstatus = new Orderstatus;
        $orderstatus->fill($request->all());
        $orderstatus->save();
        return response()->json($orderstatus);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderstatus = Orderstatus::find($id);
        return response()->json($orderstatus);
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
        $orderstatus = Orderstatus::where('order_id', $id)->first();
        $orderstatus->fill($request->all());
        $orderstatus->save();
        return response()->json($orderstatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orderstatus = Orderstatus::find($id)->delete();
        return response()->json($orderstatus);
    }
}
