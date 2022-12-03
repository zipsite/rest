<?php

namespace App\Http\Controllers;

use App\Models\TypeAccess;
use Illuminate\Http\Request;

class TypeAccessController extends Controller
{
    public function showAllType(){
        $types = TypeAccess::all();
        $result = [];
        foreach($types as $type){
            array_push($result, [
                'id' => $type->id,
                'name' => $type->name
            ]);
        }
        return response()->json($result);
    }
    public function showType(Request $request, $id) {
        $type = TypeAccess::find($id);
        $result = [
            'id' => $type->id,
            'name' => $type->name,
        ];
        return response()->json($result);
    }

    public function createType(Request $request) {
        $input = $request->all();
        $type = TypeAccess::create([
            'name' => $input['name']
        ]);
        return response()->json([
            'id' => $type->id,
            "name" => $type->name
        ]);
    }

    public function updateType(Request $request){
        $input = $request->all();
        $type = TypeAccess::find($input["id"]);
        $type->name = $input['name'];
        $type->save();
        return response()->json([
            'id' => $type->id,
            "name" => $type->name
        ]);
    }
    public function deleteType(Request $request, $id){
        $user = TypeAccess::find($id);
        $result = [
            'id' => $user->id,
            'name' => $user->name
        ];
        $user->delete();
        return response()->json($result);
    }
}
