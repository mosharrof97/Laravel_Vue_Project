<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Product::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name'=> 'required',
            'price'=> 'required',
            'description'=> 'required',
        ]);

        $product = Product::create($validateData);
        return response()->json($product, 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if($product){
            return response()->json($product, 200);
        }else{
            return response()->json(['message' => 'Product Not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name'=> 'required',
            'price'=> 'required',
            'description'=> 'required',
        ]);
        $product = Product::find($id);
        if($product){
            $product->update($validateData);
            return response()->json($product, 200);
        }else{
            return response()->json(['message' => 'Product Not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if($product){
            $product->delete();
            return response()->json(null, 204);
        }else{
            return response()->json(['message' => 'Product Not found'], 404);
        }
    }
}
