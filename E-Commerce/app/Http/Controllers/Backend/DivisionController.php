<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;

class DivisionController extends Controller
{
    
    public function index()
    {
        $divisions = Division::orderBy('priority','ASC')->get();
        return view('backend.pages.divisions.manage',compact('divisions'));
    }

    
    public function create()
    {
        return view('backend.pages.divisions.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|max:255',
            'priority'   => 'required|max:100',
        ]);

        $division = new Division();
        $division->name     = $request->name;
        $division->priority = $request->priority;

        $division->save();

        session()->flash('type','success');
        session()->flash('message','A New Division Has Been Added');
        return redirect()->back();
    }

    
    
    public function edit($id)
    {
        $division = Division::find($id);

        return view('backend.pages.divisions.edit',compact('division'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'       => 'required|max:255',
            'priority'   => 'required|max:100',
        ]);

        $division = Division::find($id);

        $division->name     = $request->name;
        $division->priority = $request->priority;

        $division->update();

        session()->flash('type','success');
        session()->flush('message','Division Updated');
        return redirect()->back();
    }

   
    public function delete($id)
    {
        $division = Division::find($id);

        // if (!is_null($division)) 
        // {
        //     $districts = District::where('division_id',$division->id)->get();
        //     foreach($districts as $district )
        //     {
        //         $district->delete();
        //     }
        //     $division->delete();
        // }

        $division->delete();
        session()->flash('type','success');
        session()->flush('message','Division Deleted Successfully');
        return redirect()->back();
    }
}
