<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Gate;



class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(Gate::allows("page_index"), 403);
        $pages = Page::orderBy("id", "desc")->paginate(10);
        return view("admin.page.index", compact("pages"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Gate::allows('page_create'), 403);
        $pages = Page::all("id", "title");
        return view("admin.page.create", compact("pages"));

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
            "heading" => "required",
            "ordering" => "required|numeric",
            "status" => "required",
            "url_key" => "unique:pages",
            "description" => "required",
            "image" => "required",
        ]);


        $url_key = $data['url_key'] ? $data['url_key'] : $data['title'];
        $data['url_key'] = str::lower(str::replace(" ", "-", $url_key));
        $data['title'] = ucwords($data['title']);

        $prntId = $request->parent_id;
        $data['parent_id'] = $prntId ? $prntId : 0;

        $page = Page::create($data);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $page->addMediaFromRequest('image')->toMediaCollection('image');
        }
        return redirect()->route('page.index')->with('success', 'Data Add Successfully');
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
        abort_unless(Gate::allows('page_edit'), 403);
        $pages = Page::all();
        $page = Page::findOrFail($id);
        return view("admin.page.edit", compact("page", "pages"));

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
        $data = $request->except('_token', '_method');
        $data = $request->validate([
            "title" => "required",
            "heading" => "required",
            "ordering" => "required",
            "status" => "required",
            "url_key" => "unique:pages,url_key," . $id,
            "description" => "required",
            
        ]);

        $title = $request->title;
        $urlKey = $request->url_key;
        $urlKey = $urlKey ? $urlKey : $title;

        $urlKeyLower = Str::lower($urlKey);
        $url_Key = Str::replace(' ', '-', $urlKeyLower);
        $data["url_key"] = $url_Key;

        $data['title'] = ucwords($data['title']);

        $page = Page::findOrFail($id);
        $page->update($data);
        if ($request->hasFile('image')) {
            $page->clearMediaCollection('image');
            $page->addMedia($request->file('image'))->toMediaCollection('image');
        }

        return redirect()->route('page.index')->with('success', 'Data Upadate Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        $data = $page->getFirstMediaUrl('id');
        return redirect()->route('page.index')->with('success', 'Record Delete Successfully');
    }
    public function upload(Request $request): JsonResponse
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
}
