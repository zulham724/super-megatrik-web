<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\TransactionReview;
use App\Http\Controllers\Controller;

class TransactionReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactionreview = TransactionReview::get();
        return response()->json($transactionreview);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transactionreview = new TransactionReview;
        $transactionreview->fill($request->all());
        $transactionreview->save();
        return response()->json($transactionreview);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transactionreview = TransactionReview::findOrFail($id);
        return response()->json($transactionreview);
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
        $transactionreview = TransactionReview::find($id);
        $transactionreview->fill($request->all());
        $transactionreview->save();
        return response()->json($transactionreview);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transactionreview = TransactionReview::find($id)->delete();
        return response()->json($transactionreview);
    }
}
