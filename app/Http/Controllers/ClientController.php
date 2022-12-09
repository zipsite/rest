<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::all();
        $result = [];
        foreach ($clients as $client) {
            array_push($result, $client->only('id', 'name'));
        }
        return response()->json($result);
    }
    public function show($id) {
        $client = Client::find($id);
        $result = $client->only('id', 'name');
        return response()->json($result);
    }

    public function store(Request $request) {
        $input = $request->all();
        $client = Client::create([
            'name' => $input['name']
        ]);
        return response()->json($client->only('id', 'name'));
    }

    public function update(Request $request, $id){
        $input = $request->all();
        $client = Client::find($id);
        $client->name = $input['name'];
        $client->save();
        return response()->json($client->only('id', 'name'));
    }
    public function destroy($id){
        $client = Client::find($id);
        $result = $client->only('id', 'name');
        $client->delete();
        return response()->json($result);
    }

}
