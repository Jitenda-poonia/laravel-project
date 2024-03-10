<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Gate;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(Gate::allows("user_index"),403);
        $users = User::orderBy('name')->paginate(5);
        return view("admin.user.index", compact("users"));
        // ya
        // return view("admin.user.index",['users'=>User::latest()->get()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Gate::allows("user_create"),403);
        $roles = Role::select('name')->get();
        return view("admin.user.create", compact("roles"));

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
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:3",
            "confirm_password" => "required|min:3|same:password",
        ], [
            'name.required' => 'Please Enter Your Name',
            'email.required' => 'Please Enter Your Email',
            'email.email' => 'Please enter a valid email',
            'password.min:3' => 'password at list must be 3 charcheter'

        ]);
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        $user->syncRoles($request->input('roles'));

        return redirect()->route("user.index")->with("success", "Data save successfully");
        // return back()->with('success','Record Save Successfully');
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
        abort_unless(Gate::allows("user_edit"),403);
        $user = User::find($id);
        $roles = Role::select("name")->get();
        $roleName = $user->Roles->pluck('name')->toArray();
       return view("admin.user.edit", compact("user", "roles", "roleName"));
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
        $password = $request->password;

        if (!$password) {

            $data = $request->validate([
                "name" => "required",
                "email" => "required|email|unique:users,email," . $id,

            ], [
                'name.required' => 'Name is Required Field',
            ]);
            $user = User::where('id', $id)->update($data);
        } else {
            $data = $request->validate([
                "name" => "required",
                "email" => "required|email|unique:users,email," . $id,
                "password" => "required|min:3",
                "confirm_password" => "required|min:3|same:password",

            ]);
            $data['password'] = Hash::make($data['password']);
            $user = User::where("id", $id)->update([
                "name" => $data["name"],
                "email" => $data["email"],
                "password" => $data["password"],

            ]);
        }
        $user = User::findOrFail($id);
        $user->syncRoles($request->input('roles'));

        return redirect()->route("user.index")->with("success", "Data update Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route("user.index")->with("success", "Data Delate Successfully");
    }
 



}
