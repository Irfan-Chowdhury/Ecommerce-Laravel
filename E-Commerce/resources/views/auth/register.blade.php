{{-- @extends('layouts.app')

@section('content') --}}

@extends('frontend.layouts.maintemplate')

@section('bodycontent')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- First Name --}}
                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        {{-- Last Name Nullable--}}
                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        {{-- Phone Unique--}}
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- email Unique --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Confirm-Password --}}
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        {{-- Address --}}
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        {{-- Division // from= RegistersUsers --}}
                        <div class="form-group row">
                            <label for="division_id" class="col-md-4 col-form-label text-md-right">{{ __('Division') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="division_id" id="division_id">
                                    <option>Please Select Your Division</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{$division->id}}">{{$division->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        
                        {{-- Districts // from= RegistersUsers --}}
                        <div class="form-group row">
                            <label for="district_id" class="col-md-4 col-form-label text-md-right">{{ __('District') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="district_id" id="district_area">
                                    <option>Please Select Your District</option>
                                </select>
                                {{-- <select class="form-control" name="district_id" id="district_id">
                                    <option>Please Select Your District</option>
                                    @foreach ($districts as $district)
                                        <option value="{{$district->id}}">{{$district->name}}</option>
                                    @endforeach
                                </select> --}}
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $.ajax({
        type:"POST",
        url: "http://localhost:8000/get-districts/",
        data: "data",
        // success: success,
        // dataType:"string"
    });

    $("#division_id").change(function() {
        // var division = getElementByID("#division_id").val();
        var division = $("#division_id").val();
        //alert(division);
        

        $('#district_area').html("");
        var option="";

        // $.get( "http://localhost:8080/Shikbo_Shobai/Laravel_Onlinestore/public/get-districts/"+division, function(data) {
        $.get( "http://localhost:8000/get-districts/"+division, function(data) {
            
            data = JSON.parse(data);
            data.forEach(function(element){
                option += "<option value=' "+ element.id +" '>"+ element.name +"</option>";
            })
            //console.log(data);

            $('#district_area').html(option);
            // xhttp.open("GET","demo_get.asp?t="+Math.random(),true);
            // xhttp.send();
        });
    });
    
    </script>    
@endsection
