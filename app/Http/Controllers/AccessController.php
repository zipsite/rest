<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\User;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function index($user_id){
        $accesses = Access::where('user_id', $user_id)->get();
        $result = [];
        foreach($accesses as $access){
            array_push($result, $access->only('id', 'type_id', 'user_id', 'data'));
        }
        return response()->json($accesses);
    }
    public function show($user_id, $id) {
        $access = Access::where('user_id', $user_id)->find($id);
        $result = $access->only('id', 'type_id', 'user_id', 'data');
        return response()->json($result);
    }

    public function store(Request $request, $user_id) {
        $input = $request->all();
        $access = Access::create([
            'type_id' => $input["type_id"],
            'user_id' => $user_id,
            'data' => $input["data"]
        ]);
        return response()->json($access->only('id', 'type_id', 'user_id', 'data'));
    }

    public function update(Request $request, $user_id, $id){
        $input = $request->all();
        $access = Access::where('user_id', $user_id)->find($id);
        $access->type_id = $input['type_id'];
        $access->data = $input['data'];

        $access->save();
        return response()->json($access->only('id', 'type_id', 'user_id', 'data'));
    }
    public function destroy($user_id, $id){
        $access = Access::where('user_id', $user_id)->find($id);
        $result = $access->only('id', 'type_id', 'user_id', 'data');
        $access->delete();
        return response()->json($result);
    }
}
