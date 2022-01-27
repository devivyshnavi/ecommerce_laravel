<?php

namespace App\Http\Controllers;

use App\Models\CMS_management;
use Illuminate\Http\Request;

class cmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CMS_management::all();
        return view("showCMS", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CMS');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            "title" => 'required',
            "description" => 'required',
            "image" => 'required'
        ]);
        if ($validated) {
            $image = $request->file('image');
            $name = rand() . $image->getClientOriginalName();
            if ($image->move(public_path('uploads/'), $name)) {
                $data = CMS_management::insert([
                    "title" => $request->title,
                    "description" => $request->description,
                    "image_path" => $name,
                ]);
                if ($data) {
                    return back()->with("msg", "success");
                } else {
                    return back()->with("msg", "error");
                }
            } else {
                return back()->with("msg", "not uploaded");
            }

            return redirect("cms")->with("msg", "not uploaded");
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
        $data = CMS_management::find($id);
        return view("editCMS", compact('data'));
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
        $image = $request->file('image');
        $name = rand() . $image->getClientOriginalName();
        if ($image) {
            if ($image->move(public_path("uploads/"), $name)) {
                $data = CMS_management::where('id', $id)->update([
                    "title" => $request->title,
                    "description" => $request->description,
                    "image_path" => $name,
                ]);
            } else {
                $data = CMS_management::where('id', $id)->update([
                    "title" => $request->title,
                    "description" => $request->description,
                ]);
            }
            if ($data) {
                return back()->with("msg", "success");
            } else {
                return back()->with("msg", "error");
            }
        }

        return redirect("cms")->with("msg", "not uploaded");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = CMS_management::find($id);
        unlink("uploads/$data->image_path");
        if ($data->delete()) {
            return back();
        }
    }
}
