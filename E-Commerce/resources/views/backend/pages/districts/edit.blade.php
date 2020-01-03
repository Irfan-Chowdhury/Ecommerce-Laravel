@extends('backend.layouts.mastertemplate')

@section('backendPageContent')

<div class="container">
    <h1 class="text-center pt-5">Update Division</h1>
    
    @include('backend.allinfo.message')
   
    <div class="row">
        <div class="col-6">
            <form action="{{route('admin.districts.update',$district->id)}}" method="POST">   
                @csrf 
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name"  value="{{$district->name}}">
                </div>
            
                <div class="form-group">
                    <label for="priority">Priority</label>
                    <input type="number" class="form-control" name="priority"  value="{{$district->priority}}">
                </div>
            
                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>
</div>

@endsection