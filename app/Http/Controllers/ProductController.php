<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {

        /*$products = Products::all();

        if ($products->count() > 0) {
            return response()->json([
                'status' => 200,
                'Products' => $products,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Empty List',
            ]);
        }*/
        return Products::select('id', 'name', 'slug', 'stock', 'category')->get();
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required',
            'stock' => 'required',
            'category' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => $validator->messages(),
            ]);
        } else {
            $product = Products::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'stock' => $request->stock,
                'category' => $request->category
            ]);
            return response()->json([
                'status' => 200,
                'Product' => $product,
            ]);
        }
    }

    public function getOne($id)
    {

        $product = Products::find($id);

        if ($product) {
            return response()->json([
                'status' => 200,
                'Product' => $product,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Product Not found',
            ]);
        }
    }

    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required',
            'stock' => 'required',
            'category' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => $validator->messages(),
            ]);
        } else {

            $product = Products::find($id);

            if ($product) {

                $product->update([
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'stock' => $request->stock,
                    'category' => $request->category
                ]);

                return response()->json([
                    'status' => 200,
                    'Product' => $product,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Product Not found',
                ]);
            }
        }
    }

    public function delete($id)
    {

        $product = Products::find($id);

        if ($product) {
            $product->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Product deleted',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Product Not found',
            ]);
        }
    }
}
