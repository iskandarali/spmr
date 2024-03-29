<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Manufacturer;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['manufacturer', 'suppliers'])->get(); //fetch all products from DB
        // dd($products);
        return view('product.list', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manufacturers = Manufacturer::all();

        return view('product.add', compact('manufacturers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $newPost = Product::create([
            'manufacturer_id' => $request->manufacturer_id,
            'title' => $request->title,
            'description' => $request->description,
            'short_notes' => $request->short_notes,
            'price' => $request->price
        ]);

        return redirect('product/' . $newPost->id . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $manufacturers = Manufacturer::all();

        return view('product.edit', [
            'product' => $product,
            'manufacturers' => $manufacturers
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update([
            'manufacturer_id' => $request->manufacturer_id,
            'title' => $request->title,
            'description' => $request->description,
            'short_notes' => $request->short_notes,
            'price' => $request->price
        ]);

        return redirect('product/' . $product->id . '/edit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('product/');
    }
}
