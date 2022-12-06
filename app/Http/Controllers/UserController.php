<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        $result = [];
        foreach ($users as $user) {
            array_push($result, $user->only('id', 'name'));
        }
        return response()->json($result);
    }
    public function show($id) {
        $user = User::find($id);
        $result = $user->only('id', 'name');
        return response()->json($result);
    }

    public function store(Request $request) {
        $input = $request->all();
        $user = User::create([
            'name' => $input['name']
        ]);
        return response()->json($user->only('id', 'name'));
    }

    public function update(Request $request, $id){
        $input = $request->all();
        $user = User::find($id);
        $user->name = $input['name'];
        $user->save();
        return response()->json($user->only('id', 'name'));
    }
    public function destroy($id){
        $user = User::find($id);
        $result = $user->only('id', 'name');
        $user->delete();
        return response()->json($result);
    }

}
