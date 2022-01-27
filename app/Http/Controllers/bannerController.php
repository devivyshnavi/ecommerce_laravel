<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class bannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Banner::all();
        return view('displaybanner', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($images as $i) {
                $name = rand() . $i->getClientOriginalName();
                $i->move(public_path('uploads/'), $name);
                Banner::insert([
                    "image_path" => $name,
                    "caption" => $request->caption
                ]);
            }
            return back()->with('msg', "uploaded");
        }
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
        $data = Banner::where('id', $id)->first();
        return view('editbanner', compact('data'));
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
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $img_path = rand() . $image->getClientOriginalName();
            if ($image->move(public_path('uploads/'), $img_path)) {
                Banner::where('id', $id)->update([
                    'image_path' => $img_path,
                    "caption" => $request->caption
                ]);
                return redirect('/banners');
            }
        } else {
            Banner::where('id', $id)->update([
                "caption" => $request->caption
            ]);
            return redirect('/banners');
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
        $data = Banner::find($id);
        unlink("uploads/$data->image_path");
        $data->delete();
        return redirect('/banners');
    }
}
