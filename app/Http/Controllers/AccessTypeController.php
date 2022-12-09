<?php

namespace App\Http\Controllers;

use App\Models\AccessType;
use Illuminate\Http\Request;

class AccessTypeController extends Controller
{
    public function index(){
        $types = AccessType::all();
        $result = [];
        foreach($types as $type){
            array_push($result, $type->only('id', 'name'));
        }
        return response()->json($result);
    }
    public function show($id) {
        $type = AccessType::find($id);

        $result = $type->only('id', 'name', 'data');
        $result['data'] = json_decode($result['data']);

        return response()->json($result);
    }

    public function store(Request $request) {
        $input = $request->all();
        $type = AccessType::create([
            'name' => $input['name'],
            'data' => json_encode($input['data'])
        ]);

        $result = $type->only('id', 'name', 'data');
        $result['data'] = json_decode($result['data']);

        return response()->json($result);
    }

    public function update(Request $request, $id){
        $input = $request->all();
        $type = AccessType::find($id);

        $type->name = $input['name'];
        $type->data = json_encode($input['data']);
        $type->save();

        $result = $type->only('id', 'name', 'data');
        $result['data'] = json_decode($result['data']);

        return response()->json($result);
    }
    public function destroy($id){
        $type = AccessType::find($id);

        $result = $type->only('id', 'name', 'data');
        $result['data'] = json_decode($result['data']);
        
        $type->delete();
        return response()->json($result);
    }
}
