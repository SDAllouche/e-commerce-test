<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {

        $categories = Categories::all();

        if ($categories->count() > 0) {
            return response()->json([
                'status' => 200,
                'Categories' => $categories,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Empty List',
            ]);
        }

        //return Categories::select('id', 'name')->get();
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => $validator->messages(),
            ]);
        } else {
            $categorie = Categories::create([
                'name' => $request->name,
            ]);
            return response()->json([
                'status' => 200,
                'Categorie' => $categorie,
            ]);
        }
    }
}
