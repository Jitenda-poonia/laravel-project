<?php

namespace App\Http\Controllers;
use App\Models\Enquery;
use Illuminate\Http\Request;

class EnqueryController extends Controller
{
    public function index(){
        $enquerys = Enquery::all();
        return view("admin.enquery",compact("enquerys"));
    }
  
    public function store(Request $request){
        $data = $request->validate([
            "name"=> "required",
            "email"=> "required",
            "phone" => 'required',
            "message" => 'required',

        ]);
        $enquery = Enquery::create($data);
        return redirect("contact")->with("success","Data submit Successfully");
    }
     
     public function status(Request $request){
        $enqId = $request->enqueryId;
      Enquery::where("id",$enqId)->update(["status"=>2]);
      echo '<button class="btn btn-success">Read</button>';


    } 
      
     public function destroy($id){
      
        $enquery = Enquery::findOrFail($id);
        $enquery->delete();
        // return redirect()->route('enquery')->with('success','');
        return back();
     }
    
}
