<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;  
use Spatie\Permission\Models\Permission;
use Gate;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(Gate::allows('role'),403);
        $roles = Role::all();
        return view("admin.role.index", compact("roles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Gate::allows("role"),403);
        $permissions = Permission::select('name')->get();
       
        return view("admin.role.create" , compact("permissions"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $role  =  Role::create([
            "name"=> $request->name,
            'guard_name'=>'web'
        ]);
          
        $role->syncPermissions($request->input('permissions'));
        return redirect()->route('role.index')->with('success','Data Add Successfully');
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
        abort_unless(Gate::allows('role'),403);
        $role = Role::find($id);
        $permissions = Permission::select('name')->get();
        
        $perName = $role->permissions->pluck('name')->toArray();
        // dd( $id);
       return view('admin.role.edit', compact('role','perName','permissions')); 
        
    }
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        
        $role->update([
            'name'=> $request->name,
        ]);
        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }
        return redirect()->route('role.index')->with('success','Data update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::where('id',$id)->delete();
        return redirect()->route('role.index')->with('success','Data Delete Successfully');
    }
    
}
