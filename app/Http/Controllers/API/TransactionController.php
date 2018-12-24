<?php

namespace App\Http\Controllers\API;

use App\Models\Orderstatus;
use App\Models\Transaction;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Transactionstatus;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::get();
        return response()->json($transactions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $total = 0;
        $order = Order::with('services.servicelist', 'materials.materiallist')->find($request->order_id);

        foreach ($order->services as $service) {
            $total += $service->servicelist->price;
        }

        foreach ($order->materials as $material) {
            $total += $material->materiallist->price*$material->quantity;
        }

        // return response()->json($total);

        $transaction = new Transaction;
        $transaction->fill($request->all());
        $transaction->transaction_number = "TR-".$request->order_id;
        $transaction->total = $total;
        $transaction->save();
        
        $transaction_status = new Transactionstatus;
        $transaction_status->transaction_id = $transaction->id;
        $transaction_status->is_paid = 1;
        $transaction_status->save();

        // $order_status = Orderstatus::where('order_id', $request->order_id)
        // ->update([
        //     'is_completed' => 1
        // ]);

        return response()->json($transaction);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::with('transactionstatus', 'transactionreview')->find($id);
        return response()->json($transaction);
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
        $transaction = Transaction::find($id);
        $transaction->fill($request->all());
        $transaction->save();
        return response()->json($transaction);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id)->delete();
        return response()->json($transaction);
    }
}
