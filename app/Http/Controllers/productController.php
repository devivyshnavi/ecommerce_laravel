<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_images;
use App\Models\Product_categories;
use App\Models\ProductAttribute;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::latest()->paginate(3);
        return view('products', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::all();
        return view("addproduct", compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Product::create([
            "category_id" => $request->category,
            "product_id" => $request->product_id,
            "name" => $request->name,
            "quantity" => $request->quantity,
            "price" => $request->price,
            "sale_price" => $request->sale,
            "features" => $request->features,
            "status" => $request->status,
        ]);
        if ($data) {
            $data1 = Product::latest()->first();
            ProductAttribute::insert([
                "price" => $data1->price,
                "quantity" => $data1->quantity,
                "features" => $data1->features,
                "products_id" => $data1->id
            ]);
            if ($request->hasFile('image')) {
                $images = $request->file('image');
                foreach ($images as $i) {
                    $name = rand() . $i->getClientOriginalName();
                    $i->move(public_path('uploads/'), $name);
                    Product_images::insert([
                        "image_path" => $name,
                        "products_id" => $data->id,
                    ]);
                }
            }
        }
        Product_categories::insert([
            "category_id" => $request->category,
            "products_id" => $data->id
        ]);
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = Product_categories::join('products', 'products.id', "=", "product_categories.products_id")
            ->where('products.id', $id)->first();
        $category = Category::all();
        $images = Product_images::where('products_id', $id)->get();
        return view("editproducts", compact('data', 'category', 'images'));
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
        $data = Product::where('id', $id)->update([
            "name" => $request->name,
            "quantity" => $request->quantity,
            "price" => $request->price,
            "sale_price" => $request->sale,
            "features" => $request->features,
            "status" => $request->status,
        ]);
        if ($data) {
            ProductAttribute::where('products_id', $id)->update([
                "price" => $request->price,
                "quantity" => $request->quantity,
                "features" => $request->features,
            ]);
            Product_categories::where('products_id', $id)->update([
                "category_id" => $request->category,
            ]);
            if ($request->hasFile('image')) {
                $deleteImages = Product_images::where('products_id', $id)->get();
                foreach ($deleteImages as $i) {
                    unlink("uploads/$i->image_path");
                }
                Product_images::where('products_id', $id)->delete();
                $images = $request->file('image');
                foreach ($images as $i) {
                    $name = rand() . $i->getClientOriginalName();
                    $i->move(public_path('uploads/'), $name);
                    Product_images::insert([
                        "image_path" => $name,
                        "products_id" => $id,
                    ]);
                }
            }
            return redirect('/products');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_data = Product::find($id);
        $images = Product_images::where('products_id', $id)->get();
        foreach ($images as $i) {
            unlink("uploads/$i->image_path");
        }
        $product_data->delete();
        return back()->with('msg', "donne");
    }
}
