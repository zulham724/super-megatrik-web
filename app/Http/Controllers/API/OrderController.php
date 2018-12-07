<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('customer','technician')->get();
        return response()->json($orders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order;
        $order->fill($request->all());
        $order->save();

        $order_status = new OrderStatus;
        $order_status->order_id = $order->id;
        $order_status->save();

        return response()->json($order);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$cityname)
    {
        $order = Order::with('order_statuses')->find($id);
        if($order->count() == 0){
            $coor = Role::with(['users.location.city'=>function($query)use($cityname){
                $query->where('name',$cityname)->first();
            }])
            ->whereHas('users.location.city',function()use($cityname){
                $query->where('name',$cityname)->first();
            })
            ->find(2);
            return response()->json($coor);
        }
        return response()->json($order);
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
        $order = Order::find($id);
        $order->fill($request->all());
        $order->save();
        return response()->json($order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id)->delete();
        return response()->json([
            'pesan'=>'berhasil delete log'
        ]);
    }

    public function notaccepted(){
        $orders = Order::with('customer')
        ->with(['order_status'=>function($query){
            $query->where('is_accepted',0);
        }])
        ->whereHas('order_status',function($query){
            $query->where('is_accepted',0);
        })
        ->get();
        return response()->json($orders);
    }

    public function accept(Request $request,$id){
        $order = Order::with('order_status')->find($id);
        if($order->order_status->is_accepted == 0){
            $order->fill($request->all());
            $order->update();
            return response()->json($order);
        } else {
            return abort(404);
        }
    }
}
