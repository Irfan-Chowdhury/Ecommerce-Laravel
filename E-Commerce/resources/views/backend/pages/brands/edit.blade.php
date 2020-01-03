@extends('backend.layouts.mastertemplate')

@section('backendPageContent')

<div class="container">
    <h1 class="text-center pt-5">Update Brand</h1>

    <div class="row">
        <div class="col-6">
            <form action="{{route('admin.brand.update',$brand->id)}}" method="POST" enctype="multipart/form-data">
                @include('backend.allinfo.message')
                @csrf 

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name"  value="{{$brand->name}}">
                </div>
            
                <div class="form-group">
                    <label for="desc">Desc:</label>
                    <textarea class="form-control" rows="5" name="desc" id="desc">{{$brand->desc}}</textarea>
                </div>
            
                <div class="form-group">
                    <label for="image">Upload Category Image</label><br>
                    <img src="{{url('image/brand-image',$brand->image)}}" height="50px" width="50px"> <br>
                    <input type="file" class="form-control" name="image">
                </div>
            
                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>
</div>

@endsection