<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\User ;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Notifications\VerifyRegistration;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    protected $redirectTo = '/';
    // protected $redirectTo = '/login';
    // protected $redirectTo = '/user/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    #From RegistersUsers

    // public function showRegistrationForm()
    // {
    //     $divisions = Division::orderBy('name','ASC')->get();
    //     $districts = District::orderBy('name','ASC')->get();

    //     return view('auth.register',compact('divisions','districts'));
    //     // return view('auth.register');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:40'],
            'last_name' => ['required', 'string', 'max:40'],
            'phone' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'max:100'],
            'division_id' => ['required', 'numeric'],
            'district_id' => ['required', 'numeric'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
        // return User::create([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'username'   => str_slug($data['first_name'].$data['last_name']),
            'phone'      => $data['phone'],
            'email'      => $data['email'],
            'password'   => Hash::make($data['password']),
            'address'    => $data['address'],
            'division_id'=> $data['division_id'],
            'district_id'=> $data['district_id'],
            'ip_address' => request()->ip(),
        ]);

        // $user->notify(new VerifyRegistration($user));

        // session()->flash('success', 'A confirmation email has sent to you..please check and confirmation your email');
        // return redirect('/');
    }
}
