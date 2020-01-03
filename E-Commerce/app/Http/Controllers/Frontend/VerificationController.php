<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class VerificationController extends Controller
{
    public function verify($token)
    {
        $user = User::where('remember_token',$token)->first();

        if (!is_null($user)) 
        {
            $user->status = 1;
            $user->remember_token = NULL;
            $user->save();
            session()->flash('success','You are Registered Successfully');
            return redirect('login');
        }
        else {
            session()->flash('Error','Your Token is not Matched !!!');
            return redirect('/');
        }
    }



}
