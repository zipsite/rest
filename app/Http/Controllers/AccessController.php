<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\TypeAccess;
use App\Models\User;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function index($user_id){
        $accesses = Access::where('user_id', $user_id)->get();
        $result = [];
        foreach($accesses as $access){
            array_push($result, $access->only('id', 'name'));
        }
        return response()->json($result);
    }
    public function show($user_id, $id) {
        $access = Access::where('user_id', $user_id)->find($id);

        $result = $access->only('id', 'name', 'type_id', 'user_id', 'data');
        $result['data'] = json_decode($result['data']);

        return response()->json($result);
    }

    public function store(Request $request, $user_id) {
        $input = $request->all();

        $access = Access::create([
            'name' => $input['name'],
            'type_id' => $input["type_id"],
            'user_id' => $user_id,
            'data' => TypeAccess::find($input['type_id'])->struct
        ]);

        $result = $access->only('id', 'name', 'type_id', 'user_id', 'data');
        $result['data'] = json_decode($result['data']);

        return response()->json($result);
    }

    public function update(Request $request, $user_id, $id){
        $input = $request->all();
        $access = Access::where('user_id', $user_id)->find($id);

        $access->type_id = $input['type_id'];
        $access->name = $input['name'];
        $access->data = json_encode($input['data']);
        $access->save();

        $result = $access->only('id', 'name', 'type_id', 'user_id', 'data');
        $result['data'] = json_decode($result['data']);

        return response()->json($result);
    }
    public function destroy($user_id, $id){
        $access = Access::where('user_id', $user_id)->find($id);

        $result = $access->only('id', 'name', 'type_id', 'user_id', 'data');
        $result['data'] = json_decode($result['data']);

        $access->delete();
        return response()->json($result);
    }
}
