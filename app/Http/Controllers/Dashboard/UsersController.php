<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Group;
use App\Role;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['permission:user-users'])->only(['index','store','update','edit','create']);
    }
    public function index()
    {
        $data=User::all();
        return view("dashboard.users.allUsers",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Role::all();
        return view("dashboard.users.create",compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"     =>"required",
            "email"    =>"required",
            "password" =>"required|min:6"
        ]);

        $request_data=$request->except(['password']);
        $request_data['password']=bcrypt($request->password);

      $user=User::create($request_data);
       $user->attachRole($request_data['group']);

        session()->flash('success',__('added successfuly'));
        
        return redirect()->route('dashboard.users.index');
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
        
     
        $data=Role::all();
        $dataa=User::findOrFail($id);
        return view('dashboard.users.edit',compact('data','dataa'));
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

        $request->validate([
            "name"     =>"required",
            "email"    =>"required",
            "password" =>"required|min:6"
        ]);
        $password=sha1($request->password);
        $row=User::findOrFail($id);
        $row->name=$request->name;
        $row->email=$request->email;
        $row->password=$password;
        $row->group=$request->group;
        $row->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route("dashboard.users.index");

    }
}
