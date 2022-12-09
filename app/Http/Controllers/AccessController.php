<?php

namespace App\Http\Controllers;

use App\Models\Access;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function index($client_id){
        $accesses = Access::where('client_id', $client_id)->get();
        $result = [];
        foreach($accesses as $access){
            array_push($result, $access->only('id', 'name'));
        }
        return response()->json($result);
    }
    public function show($client_id, $id) {
        $access = Access::where('client_id', $client_id)->find($id);

        $result = $access->only('id', 'client_id', 'sample_id', 'name', 'data');
        $result['data'] = json_decode($result['data']);

        return response()->json($result);
    }

    public function store(Request $request, $client_id) {
        $input = $request->all();

        $access = Access::create([
            'name' => $input['name'],
            'sample_id' => $input["sample_id"],
            'client_id' => $client_id,
            'data' => json_encode($input['data'])
        ]);

        $result = $access->only('id', 'client_id', 'sample_id', 'name', 'data');
        $result['data'] = json_decode($result['data']);

        return response()->json($result);
    }

    public function update(Request $request, $client_id, $id){
        $input = $request->all();
        $access = Access::where('client_id', $client_id)->find($id);

        $access->sample_id = $input['sample_id'];
        $access->name = $input['name'];
        $access->data = json_encode($input['data']);
        $access->save();

        $result = $access->only('id', 'client_id', 'sample_id', 'name', 'data');
        $result['data'] = json_decode($result['data']);

        return response()->json($result);
    }
    public function destroy($client_id, $id){
        $access = Access::where('client_id', $client_id)->find($id);

        $result = $access->only('id', 'client_id', 'sample_id', 'name', 'data');
        $result['data'] = json_decode($result['data']);

        $access->delete();
        return response()->json($result);
    }
}
