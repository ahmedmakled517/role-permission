<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Role;
class PowerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:powers-users'])->only(['index','store','update','edit','create']);
    }
    public function index()
    {
        $data= \App\Role::all();
      return view("dashboard.power.powers",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Role::all();
        return view("dashboard.power.create",compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $role=Role::findOrFail($request->group);
        $role->syncPermissions($request->permissions);

      
        
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.index');
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
        $data=Role::findOrFail($id);
        return view("dashboard.power.edit",compact('data'));

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
        
        $role=Role::findOrFail($id);
        $role->syncPermissions($request->permissions);

      
        
        session()->flash('success', __('site.edit_successfully'));
        return redirect()->route('dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
