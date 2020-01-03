@extends('frontend.layouts.maintemplate')


@section('bodycontent')


	<div class="container">
	  <ul class="breadcrumb">
	    <li><a href="index.html"><i class="fa fa-home"></i></a></li>
	    <li><a href="#">Set on Page</a></li>
	    <li><a href="#">Set on Page</a></li>
      </ul>
      

      <div class="row">
          <div class="col-md-12">
              <h1>Welcome {{$user->first_name .' '. $user->last_name}}</h1>
              <h5>You can Change/update your Profile Information</h5>
          </div>
      </div>

      <div class="row">
          <div class="col-md-6">
            <div class="card card-body" onclick="location.href='{{route('user.profile')}}'">
                <button class="btn btn-facebook">Update Your Profile</button>
            </div>
          </div>
      </div>
	</div>



@endsection

