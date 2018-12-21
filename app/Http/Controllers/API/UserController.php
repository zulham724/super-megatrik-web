<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->fill($request->all());
        $user->password = bcrypt($request['password']);
        $user->save();

        $user_location = [
            'state_id' => 1,
            'city_id' => 1,
            'district_id' => 1
        ];
        $location = $user->location()->create($user_location);
        return response()->json($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$relation)
    {
        if ($relation == 'customer_orders') {
            $user = User::with(['customer_orders' => function($query){
                $query->with(['transaction', 'order_status', 'materials' => function($query2){
                    $query2->join('material_lists', 'materials.material_list_id', '=', 'material_lists.id');
                }, 'technician']);
            }])->find($id);
            return response()->json($user);
        }
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
        $user = User::find($id);
        $user->fill($request->all());
        if(isset($request["password"])){
            $user->password = bcrypt($request['password']);
        }
        $user->save();
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return response()->json($user);
    }

    
}
