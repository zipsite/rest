<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showAllUser(){
        $users = User::all();
        $result = [];
        foreach($users as $user){
            array_push($result, [
                'id' => $user->id,
                'name' => $user->name
            ]);
        }
        return response()->json($result);
    }
    public function showUser(Request $request, $id) {
        $user = User::find($id);
        $result = [
            'id' => $user->id,
            'name' => $user->name,
            'accesses' => []
        ];
        foreach ($user->accesses as $access) {
            array_push($result['accesses'], [
                'id' => $access->id,
                'type' => $access->typeId[0]->type_name,
                'data' => $access->data
            ]);
        }
        return response()->json($result);
    }

    public function createUser(Request $request) {
        $input = $request->all();
        $user = User::create([
            'name' => $input['name']
        ]);
        return response()->json([
            'id' => $user->id,
            "name" => $user->name
        ]);
    }

    public function updateUser(Request $request){
        $input = $request->all();
        $user = User::find($input["id"]);
        $user->name = $input['name'];
        $user->save();
        return response()->json([
            'id' => $user->id,
            "name" => $user->name
        ]);
    }
    public function deleteUser(Request $request, $id){
        $user = User::find($id);
        $result = [
            'id' => $user->id,
            'name' => $user->name,
            'accesses' => []
        ];
        foreach ($user->accesses as $access) {
            array_push($result['accesses'], [
                'id' => $access->id,
                'type' => $access->typeId[0]->type_name,
                'data' => $access->data
            ]);
        }
        $user->delete();
        return response()->json($result);
    }

}
