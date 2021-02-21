<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Group;
use App\Role;
class GroupsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:group-users'])->only(['index','store','update','edit','create']);
    }
    public function index()
    {
        $data=Role::all();
        return view("dashboard.group.allGroup",compact("data"));
    }

   
    public function create()
    {
        return view("dashboard.group.create");
    }

   
    public function store(Request $request)
    {

        $request->validate([
            "name"     =>"required",
          
        ]);
        

        $key=$request->name;
    
        $role = \App\Role::create([
            'name' => $key,
            'display_name' => ucwords(str_replace('_', ' ', $key)),
            'description' => ucwords(str_replace('_', ' ', $key))
        ]);
        
        session()->flash('success',__('added successfuly'));
        
        return redirect()->route('dashboard.groups.index');

    }

   
    public function show($id)
    {
        
    }

   
    public function edit($id)
    {
        $data=Role::findOrFail($id);
            return view("dashboard.group.edit",compact("data"));
    }

  
    public function update(Request $request, $id)
    {
     
        $row =Role::findOrFail($id);
        $row->name=$request->name;
        $row->save();
        return redirect()->to('http://mypioner.devel/dashboard/groups');
    }

  
    public function destroy($id)
    {

        $article = Role::findOrFail($id);
        $article->delete();
        return back();
    }
}
