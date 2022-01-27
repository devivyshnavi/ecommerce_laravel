<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_images;

class productApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $product = Product::all();
        // $images = Product_images::all();
        // return response()->json(["products" => $product, "images" => $images]);
        $list = [];
        $product = Product::all();
        foreach ($product as $prod) {
            $listimage = [];
            foreach ($prod->productImages as $image) {
                $listimage[] = [
                    'image' => asset('uploads/' . $image->image_path)
                ];
            }
            $list[] = [
                'id' => $prod->id,
                'name' => $prod->name,
                'product_id' => $prod->product_id,
                'category_id' => $prod->category_id,
                'price' => $prod->price,
                'saleprice' => $prod->sale_price,
                'images' => $listimage,
            ];
        }

        return response()->json(['products' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);
        $images = $products->productImages;
        return response()->json(['products' => $products, "images" => $images]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
