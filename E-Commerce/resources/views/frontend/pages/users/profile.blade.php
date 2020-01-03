@extends('frontend.layouts.maintemplate')


@section('bodycontent')


	<div class="container">
	  <ul class="breadcrumb">
	    <li><a href="index.html"><i class="fa fa-home"></i></a></li>
	    <li><a href="#">Profile</a></li>
      </ul>
      

     <div class="row">
         <div class="card card-body">
             <div class="col-md-6">
                 <form action="{{route('user.profile.update')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control{{$errors->has('first_name') ? 'is-invalid' :''}}" value="{{$user->first_name}}" required>
                        @if ($errors->has('first_name'))
                            <span>
                                <strong>{{$errors->first('first_name')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="form-control{{$errors->has('last_name') ? 'is-invalid' :''}}" value="{{$user->last_name}}" required>
                        @if ($errors->has('last_name'))
                            <span>
                                <strong>{{$errors->first('last_name')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control{{$errors->has('username') ? 'is-invalid' :''}}" value="{{$user->username}}" required>
                        @if ($errors->has('username'))
                            <span>
                                <strong>{{$errors->first('username')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control{{$errors->has('email') ? 'is-invalid' :''}}" value="{{$user->email}}" required>
                        @if ($errors->has('email'))
                            <span>
                                <strong>{{$errors->first('email')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control{{$errors->has('phone') ? 'is-invalid' :''}}" value="{{$user->phone}}" required>
                        @if ($errors->has('phone'))
                            <span>
                                <strong>{{$errors->first('phone')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Division</label>
                        <select class="form-control" name="division_id" id="division_id">
                            <option value="">Please Select Your Division</option>
                            @foreach ($divisions as $division)
                                <option value="{{$division->id}}" {{$user->division_id==$division->id ? 'selected' : ''}}> {{$division->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>District</label>
                        <select class="form-control" name="district_id" id="district_id">
                            <option value="">Please Select Your Division</option>
                            @foreach ($districts as $district)
                                <option value="{{$district->id}}" {{$user->district_id==$district->id ? 'selected' : ''}}> {{$district->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control{{$errors->has('address') ? 'is-invalid' :''}}" value="{{$user->address}}" required>
                        @if ($errors->has('address'))
                            <span>
                                <strong>{{$errors->first('address')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="shipping_address">Shipping Address</label>
                        <input type="text" name="shipping_address" class="form-control{{$errors->has('shipping_address') ? 'is-invalid' :''}}" value="{{$user->shipping_address}}" >
                        @if ($errors->has('shipping_address'))
                            <span>
                                <strong>{{$errors->first('shipping_address')}}</strong>
                            </span>
                        @endif
                    </div>
                    
                    {{-- <div class="form-group">
                        <label for="password">New Password [Optional]</label>
                        <input type="password" name="password" class="form-control{{$errors->has('password') ? 'is-invalid' :''}}" value="{{$user->password}}" required>
                        @if ($errors->has('password'))
                            <span>
                                <strong>{{$errors->first('password')}}</strong>
                            </span>
                        @endif
                    </div> --}}

                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Update Profile</button>
                    </div>
                    
                </form>
             </div>
         </div>
     </div>

      <div class="row">
          <div class="col-md-6">
            <div class="card card-body" onclick="location.href='{{route('user.profile')}}'">
                <h2>Update Your Profile</h2>
            </div>
          </div>
      </div>
	</div>



@endsection

