<?php

namespace App\Http\Controllers;

use App\Models\TypeAccess;
use Illuminate\Http\Request;

class TypeAccessController extends Controller
{
    public function index(){
        $types = TypeAccess::all();
        $result = [];
        foreach($types as $type){
            array_push($result, $type->only('id', 'name'));
        }
        return response()->json($result);
    }
    public function show($id) {
        $type = TypeAccess::find($id);

        $result = $type->only('id', 'name', 'struct');
        $result['struct'] = json_decode($result['struct']);

        return response()->json($result);
    }

    public function store(Request $request) {
        $input = $request->all();
        $type = TypeAccess::create([
            'name' => $input['name'],
            'struct' => json_encode($input['struct'])
        ]);

        $result = $type->only('id', 'name', 'struct');
        $result['struct'] = json_decode($result['struct']);

        return response()->json($result);
    }

    public function update(Request $request, $id){
        $input = $request->all();
        $type = TypeAccess::find($id);

        $type->name = $input['name'];
        $type->struct = json_encode($input['struct']);
        $type->save();

        $result = $type->only('id', 'name', 'struct');
        $result['struct'] = json_decode($result['struct']);

        return response()->json($result);
    }
    public function destroy($id){
        $type = TypeAccess::find($id);

        $result = $type->only('id', 'name', 'struct');
        $result['struct'] = json_decode($result['struct']);
        
        $type->delete();
        return response()->json($result);
    }
}
