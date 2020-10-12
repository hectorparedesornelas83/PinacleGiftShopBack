<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::get();
        echo json_encode($products);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Products();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->imageurl = $request->input('imageurl');
        $product->price = $request->input('price');
        $product->save();
        echo json_encode($product);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $products_id)
    {
        $product = Products::find($products_id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->imageurl = $request->input('imageurl');
        $product->price = $request->input('price');
        $product->save();
        echo json_encode($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($products_id)
    {
       $product = Products::find($products_id);
       $product->delete();
    }
}
