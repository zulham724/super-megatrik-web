<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Order;
use App\Models\Service;
use App\Models\Material;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('order.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data ['technicians']= User::where('role_id', 2)->get();
        $data ['customers']= User::where('role_id', 3)->get();
        return view('order.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $order = new Order;
        $order->fill($request['orders']);
        $order->save();

        foreach ($request['materials'] as $m => $material) {
            $mat = new Material;
            $mat->fill($material);
            $mat->order_id = $order->id;
            $mat->save();
        }

        foreach ($request['services'] as $s => $service) {
            $serv = new Service;
            $serv->fill($service);
            $serv->order_id = $order->id;
            $serv->save();
        }

        return redirect()->route('orders.index');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data ['technicians']= User::where('role_id', 2)->get();
        $data ['customers']= User::where('role_id', 3)->get();
        
        $data ['order']= Order::with('materials','services')->find($id);
        return view('order.edit', $data);
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
        $order->fill($request['orders']);
        $order->update();

        $order_materials = Material::where('order_id',$order->id)->delete();
        foreach ($request['materials'] as $m => $material) {
            $mat = new Material;
            $mat->fill($material);
            $mat->order_id = $order->id;
            $mat->save();
        }

        $order_services = Service::where('order_id',$order->id)->delete();
        foreach ($request['services'] as $s => $service) {
            $serv = new Service;
            $serv->fill($service);
            $serv->order_id = $order->id;
            $serv->save();
        }

        return redirect()->route('orders.index');;
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
}
