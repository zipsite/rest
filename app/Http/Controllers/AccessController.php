<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\User;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function index($user_id){
        $accesses = User::find($user_id)->accesses;
        $result = [];
        foreach($accesses as $access){
            array_push($result, [
                'id' => $access->id,
                'type_id' => $access->type_id,
                'user_id' => $access->user_id,
                'data' => $access->data
            ]);
        }
        return response()->json($result);
    }
    public function show($user_id, $id) {
        $access = User::find($user_id)->accesses->find($id);
        $result = [
            'id' => $access->id,
            'type_id' => $access->type_id,
            'user_id' => $access->user_id,
            'data' => $access->data
        ];
        return response()->json($result);
    }

    public function store(Request $request, $user_id) {
        $input = $request->all();
        $access = Access::create([
            'type_id' => $input["type_id"],
            'user_id' => $user_id,
            'data' => $input["data"]
        ]);
        return response()->json([
            'id' => $access->id,
            'type_id' => $access->type_id,
            'user_id' => $access->user_id,
            'data' => $access->data
        ]);
    }

    public function update(Request $request, $user_id, $id){
        $input = $request->all();
        $access = User::find($user_id)->accesses->find($id);
        $access->type_id = $input['type_id'];
        $access->data = $input['data'];

        $access->save();
        return response()->json([
            'id' => $access->id,
            'type_id' => $access->type_id,
            'user_id' => $access->user_id,
            'data' => $access->data
        ]);
    }
    public function destroy($user_id, $id){
        $access = User::find($user_id)->accesses->find($id);
        $result = [
            'id' => $access->id,
            'type_id' => $access->type_id,
            'user_id' => $access->user_id,
            'data' => $access->data
        ];
        $access->delete();
        return response()->json($result);
    }
}
