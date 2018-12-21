<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Servicecategory;

class ServicecategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicecategories = Servicecategory::get();
        return response()->json($servicecategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $servicecategory = new Servicecategory;
        $servicecategory->fill($request->all());
        $servicecategory->save();
        return response()->json($servicecategory);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicecategory = Servicecategory::with('servicelists')
                            ->find($id);
        return response()->json($servicecategory);
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
        $servicecategory = Servicecategory::find($id);
        $servicecategory->fill($request->all());
        $servicecategory->save();
        return response()->json($servicecategory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicecategory = Servicecategory::find($id)->delete();
        return response()->json($servicecategory);
    }
}
