<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index()
    {
        /*$clients = Clients::all();

        if ($clients->count() > 0) {
            return response()->json([
                'status' => 200,
                'Clients' => $clients,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Empty List',
            ]);
        }*/

        return Clients::select('id', 'name', 'address', 'phone')->get();
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => $validator->messages(),
            ]);
        } else {
            $client = Clients::create([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,

            ]);
            return response()->json([
                'status' => 200,
                'Client' => $client,
            ]);
        }
    }
}
