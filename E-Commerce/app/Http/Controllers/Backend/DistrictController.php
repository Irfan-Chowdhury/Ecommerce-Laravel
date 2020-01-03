<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\District;


class DistrictController extends Controller
{
    
    public function index()
    {
        $districts = District::orderBy('priority','ASC')->get();
        return view('backend.pages.districts.manage',compact('districts'));
    }

    
    public function create()
    {
        return view('backend.pages.districts.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|max:255',
            'priority'   => 'required|max:100',
        ]);

        $district = new District();
        $district->name     = $request->name;
        $district->priority = $request->priority;

        $district->save();

        session()->flash('type','success');
        session()->flush('message','A New District Has Been Added');
        return redirect()->back();
    }

    
    public function edit($id)
    {
        $district = District::find($id);

        return view('backend.pages.districts.edit',compact('district'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'       => 'required|max:255',
            'priority'   => 'required|max:100',
        ]);

        $district = District::find($id);

        $district->name     = $request->name;
        $district->priority = $request->priority;

        $district->update();

        session()->flash('type','success');
        session()->flush('message','District Updated');
        return redirect()->back();
    }

   
    public function delete($id)
    {
        $district = District::find($id);

        // if (!is_null($district)) 
        // {
        //     $districts = District::where('division_id',$division->id)->get();
        //     foreach($districts as $district )
        //     {
        //         $district->delete();
        //     }
        //     $division->delete();
        // }

        $district->delete();
        session()->flash('type','success');
        session()->flush('message','District Deleted Successfully');
        return redirect()->back();
    }
}
