@extends('backend.layouts.mastertemplate')

@section('backendPageContent')

<div class="container">
    <h1 class="text-center pt-5">Add New Brand</h1>

    {{-- --------- Check in Session Message -------- --}}
            @include('backend.allinfo.message')
    {{-- ------------------------------------------- --}}

    <div class="row">
        <div class="col-6">
            <form action="{{route('admin.brand.store')}}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name"  placeholder="Brand Name">
                </div>
            
                <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea class="form-control" rows="5" name="desc" id="desc"></textarea>
                </div>
            
                <div class="form-group">
                    <label for="image">Upload Category Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
            
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>

@endsection