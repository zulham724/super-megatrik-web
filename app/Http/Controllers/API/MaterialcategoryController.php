<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Materialcategory;

class MaterialcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materialcategories = Materialcategory::get();
        return response()->json($materialcategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $materialcategory = new Materialcategory;
        $materialcategory->fill($request->all());
        $materialcategory->save();
        return response()->json($materialcategory);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materialcategory = Materialcategory::find($id);
        return response()->json($materialcategory);
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
        $materialcategory = Materialcategory::find($id);
        $materialcategory->fill($request->all());
        $materialcategory->save();
        return response()->json($materialcategory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materialcategory = Materialcategory::find($id)->delete();
        return response()->json($materialcategory);
    }
}
