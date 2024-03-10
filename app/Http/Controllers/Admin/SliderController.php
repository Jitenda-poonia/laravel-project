<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Gate;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(Gate::allows("slider_index"),403);
        $sliders = Slider::all();
        return view("admin.slider.index", compact("sliders"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Gate::allows("slider_create"),403);
        return view("admin.slider.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            "title" => "required",
            "ordering" => "required",
            "status" => "required",
            "image" => "required",
        ]);

        $slider = Slider::create($data);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $slider->addMediaFromRequest('image')->toMediaCollection('image');
        }
        return redirect()->route('slider.index')->with("success", "Record Save Successfullay");
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
        abort_unless(Gate::allows('slider_edit'),403);
        $slider = Slider::find($id);
       return view("admin.slider.edit", compact("slider"));
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
        $data = $request->validate([
            "title" => "required",
            "ordering" => "required",
            "status" => "required",
            // "image"=> "required",
        ]);
        $slider = Slider::findOrFail($id);
        $slider->update($data);
        
        
        if ($request->hasFile('image')) {
            $slider->clearMediaCollection('image');
            $slider->addMedia($request->file('image'))->toMediaCollection('image');
        }
        
       if ($request->remove) {
        $slider->clearMediaCollection('image');
        
       }
        return redirect()->route('slider.index')->with('success', 'Record Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $slider = Slider::findOrFail($id);
      $slider->delete();
      $data = $slider->getFirstMediaUrl('id');
        return redirect()->route('slider.index')->with('success', 'Record Delate Successfully');
    }
}
