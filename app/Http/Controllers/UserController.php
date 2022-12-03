<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\User;
use Illuminate\Http\Client\Response;
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

    public function createUser(Request $request){
        return "createUser";
    }

    public function updateUser(){
        return "updateUser";
    }
    public function deleteUser(){
        return "deleteUser";
    }

}
