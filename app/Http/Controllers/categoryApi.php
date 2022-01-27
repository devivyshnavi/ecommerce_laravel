<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_images;

class categoryApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return response()->json(["category" => $category]);
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
        // $product = Product::join('product_images', 'products.id', '=', 'product_images.products_id')->where('products.category_id', $id)->get();

        // return response()->json(["product" => $product]);
        $list = [];
        $product = Product::where('category_id', $id)->get();
        foreach ($product as $pro) {
            $listimage = [];
            foreach ($pro->productImages as $image) {
                $listimage[] = [
                    'image' => asset('uploads/' . $image->image_path)
                ];
            }
            $list[] = [
                'name' => $pro->name,
                'id' => $pro->id,
                'product_id' => $pro->product_id,
                'category_id' => $pro->category_id,
                'price' => $pro->price,
                'saleprice' => $pro->sale_price,
                'images' => $listimage,
            ];
        }

        return response()->json(['categories' => $list]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
