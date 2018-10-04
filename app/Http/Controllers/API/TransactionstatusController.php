<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transactionstatus;

class TransactionstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactionstatuses = Transactionstatus::get();
        return response()->json($transactionstatuses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transactionstatus = new Transactionstatus;
        $transactionstatus->fill($request->all());
        $transactionstatus->save();
        return response()->json($transactionstatus);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transactionstatus = Transactionstatus::find($id);
        return response()->json($transactionstatus);
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
        $transactionstatus = Transactionstatus::find($id);
        $transactionstatus->fill($request->all());
        $transactionstatus->save();
        return response()->json($transactionstatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transactionstatus = Transactionstatus::find($id)->delete();
        return response()->json($transactionstatus);
    }
}
