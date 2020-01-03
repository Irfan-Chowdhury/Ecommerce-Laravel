<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use Auth;
class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $user = Auth::user();
        return view('frontend.pages.users.dashboard',compact('user'));
    }

    public function profile()
    {
        $user = Auth::user();
        $divisions = Division::orderBy('priority','asc')->get();
        $districts = District::orderBy('name','asc')->get();
        return view('frontend.pages.users.profile',compact('user','divisions','districts'));
    }

    public function profile_update(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'first_name'    => 'required|string|max:30',
            'last_name'     => 'nullable|string|max:30',
            'username'      => 'required|alpha_dash|max:100|unique:users,username,' .$user->id,
            'email'         => 'required|string|email|max:100|unique:users,email,'.$user->id,
            'division_id'   => 'required|numeric',
            'district_id'   => 'required|numeric',
            'phone'         => 'required|max:15|unique:users,phone,'.$user->id,
            'address'       => 'required|max:100',
        ]);


        $user->first_name   = $request->first_name;
        $user->last_name    = $request->last_name;
        $user->username     = $request->username;
        $user->email        = $request->email;
        $user->division_id  = $request->division_id;
        $user->district_id  = $request->district_id;
        $user->phone        = $request->phone;
        $user->address      = $request->address;
        $user->shipping_address = $request->shipping_address;
       

        if ($request->password != NULL || $request->password != "") 
        {
            $user->password = Hash::make($request->password);
        }

        $user->ip_address = request()->ip();
        $user->update();

        session()->flash('success','User Profile Updated Successfully !!!');
        return back();
        
    }


}
