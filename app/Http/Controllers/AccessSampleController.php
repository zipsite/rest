<?php

namespace App\Http\Controllers;

use App\Models\AccessSample;
use Illuminate\Http\Request;

class AccessSampleController extends Controller
{
    public function index(){
        $samples = AccessSample::all();
        $result = [];
        foreach($samples as $sample){
            array_push($result, $sample->only('id', 'name'));
        }
        return response()->json($result);
    }
    public function show($id) {
        $sample = AccessSample::find($id);

        $result = $sample->only('id', 'type_id', 'name', 'data');
        $result['data'] = json_decode($result['data']);

        return response()->json($result);
    }

    public function store(Request $request) {
        $input = $request->all();
        $sample = AccessSample::create([
            'name' => $input['name'],
            'data' => json_encode($input['data'])
        ]);

        $result = $sample->only('id', 'type_id', 'name', 'data');
        $result['data'] = json_decode($result['data']);

        return response()->json($result);
    }

    public function update(Request $request, $id){
        $input = $request->all();
        $sample = AccessSample::find($id);

        $sample->name = $input['name'];
        $sample->data = json_encode($input['data']);
        $sample->save();

        $result = $sample->only('id', 'type_id', 'name', 'data');
        $result['data'] = json_decode($result['data']);

        return response()->json($result);
    }
    public function destroy($id){
        $sample = AccessSample::find($id);

        $result = $sample->only('id', 'type_id', 'name', 'data');
        $result['data'] = json_decode($result['data']);
        
        $sample->delete();
        return response()->json($result);
    }
}
