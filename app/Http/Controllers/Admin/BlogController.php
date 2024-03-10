<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Gate;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(Gate::allows("blog_index"),403);
        $blogs = Blog::orderBy("created_at","desc")->paginate(10);
        return view("admin.blog.index" ,compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Gate::allows("blog_create"),403);
        return view("admin.blog.create");
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $identifier = strtolower(preg_replace("/[^a-zA-Z]+/","", $request->identifier));
        // $request->identifier = $identifier;
        $data = $request->validate([
            "title"=> "required",
            "heading"=> "required",
            "ordering"=> "required|numeric", //between:15,70 //|min:5
            "status"=> "required",
            "identifier"=> "required|unique:blogs",
            "description"=> "required",
            "image"=> "required",
        ]);
       
        
        $data['identifier'] = $identifier;
         
          $blog =  Blog::create($data);
          if($request->hasFile('image') && $request->file('image')->isValid()){
            $blog->addMediaFromRequest('image')->toMediaCollection('image');
        }
        return redirect()->route('blog.index')->with('success','Record Add Successfully');
      
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
        abort_unless(Gate::allows("blog_edit"),403);

        $blog = Blog::find($id);
        return view('admin.blog.edit',compact('blog'));
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
        $identifier = strtolower(preg_replace("/[^a-zA-Z]+/","", $request->identifier));
        // $request->identifier = $identifier;
        $data = $request->validate([
            "title"=> "required",
            "heading"=> "required",
            "ordering"=> "required",
            "status"=> "required",
            "identifier"=> "required|unique:blogs,identifier,".$id,
            "description"=> "required",
            // "image"=> "required",
        ]);
        
        
        $data['identifier'] = $identifier;   
        $blog =  Blog::findOrFail($id);
        $blog->update($data);
        if ($request->hasFile('image')) {
           $blog->clearMediaCollection('image');
           $blog->addMedia($request->file('image'))->toMediaCollection('image');
       }
        return redirect()->route('blog.index')->with('success','Record Update Successfully');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        $data = $blog->getFirstMediaUrl('id');
        return redirect()->route('blog.index')->with('success','Record Delete Successfully');
    }
}
