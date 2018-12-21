<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Order;
use App\Models\Service;
use App\Models\Orderstatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $order->fill($request->except('service_list_id'));
        $order->save();

        $order_status = new Orderstatus;
        $order_status->order_id = $order->id;
        $order_status->save();

        $service = new Service;
        $service->order_id = $order->id;
        $service->service_list_id = $request->input('service_list_id');
        $service->save();

        $this->send_notif_technician($order->latitude, $order->longitude, $order->id);

        return response()->json($order);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $cityname=null)
    {
        if ($cityname == null) {
            $order = Order::with('customer','order_status', 'services.servicelist')->find($id);
            return response()->json($order);
        }
        // $cityname = urldecode($cityname);
        $order = Order::with(['order_status' => function($query){
            $query->where('is_accepted', '=', 1);
        }])
        ->whereHas('order_status', function($query){
            $query->where('is_accepted', '=', 1);
        })->find($id);

        if(empty($order)){
            $coor = User::with(['location.city'=>function($query)use($cityname){
                $query->where('name',$cityname);
            }])
            ->whereHas('location.city',function($query)use($cityname){
                $query->where('name',$cityname);
            })
            ->where('role_id', 2)
            ->first();
            return response()->json($coor);
        }
        return response()->json((object) []);
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

    public function accept(Request $request, $id){
        $order = Order::with('order_status')->find($id);
        if($order != null && $order->order_status->is_accepted == 0){
            $order->fill($request->all());
            $order->update();
            $order->order_status->update(['is_accepted' => 1]);
            return response()->json($order);
        } else {
            return abort(404);
        }
    }

    public function kerjakan(Request $request, $id)
    {
        $order = Order::find($id);
        $order->fill([
            'order_start' => date('Y-m-d H:i:s')
        ]);
        $order->update();

        return response()->json($order);
    }

    public function selesai(Request $request, $id)
    {
        $order = Order::find($id);
        $order->fill([
            'order_end' => date('Y-m-d H:i:s')
        ]);
        $order->update();
        $order->order_status->update(['is_completed' => 1]);

        return response()->json($order);
    }

    public function materials($id)
    {
        $order = Order::with(['materials' => function($query){
            $query->join('material_lists', 'materials.material_list_id', '=', 'material_lists.id');
        }])->find($id);
        return response()->json($order);
    }

    private function distance($lat1 = 0, $lng1 = 0, $lat2 = 0, $lng2 = 0, $miles = false)
    {
        $pi80 = M_PI / 180;
        $lat1 *= $pi80;
        $lng1 *= $pi80;
        $lat2 *= $pi80;
        $lng2 *= $pi80;
        
        $r = 6372.797; // mean radius of Earth in km
        $dlat = $lat2 - $lat1;
        $dlng = $lng2 - $lng1;
        $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $km = $r * $c;
        
        return ($miles ? ($km * 0.621371192) : $km);
    }

    private function send_notif_technician($lat, $lng, $order_id)
    {
        $technicians = User::with('location')->where('role_id', 3)->get();

        foreach ($technicians as $user) {
            $distance = $this->distance($lat, $lng, $user->location->latitude, $user->location->longitude);
            if (($distance+0.200) < 5) {
                OneSignal::sendNotificationToUser(
                    "Order baru telah tersedia. Bid Sekarang!",
                    $user->os_player_id,
                    $url = null,
                    $data = [
                        'type' => 'bid',
                        'order_id' => $order_id
                    ],
                    $buttons = null,
                    $schedule = null
                );
            }
        }
    }
}
