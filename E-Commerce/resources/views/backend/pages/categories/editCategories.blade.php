@extends('backend.layouts.mastertemplate')

@section('backendPageContent')

<div class="container">
    <h1 class="text-center pt-5">Update Category</h1>

    <div class="row">
        <div class="col-6">
            <form action="{{route('updateCategory',$category->id)}}" method="POST" enctype="multipart/form-data">
                @include('backend.allinfo.message')
                @csrf 

                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" name="name"  value="{{$category->name}}">
                </div>
            
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" rows="5" name="description" id="description">{{$category->description}}</textarea>
                </div>
            
                <div class="form-group">
                    <label for="parent_id">Parent Category</label>
                    <select name="parent_id" id="parent_id" class="form-control">
                        <option value="">Please Select A Category</option>
                        @foreach ($primary_categories as $cat)
                            <option value="{{$cat->id}}" {{$cat->id == $category->parent_id? 'selected':''}}>{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Upload Category Image</label><br>
                    <img src="{{url('image/category-image',$category->image)}}" height="50px" width="50px"> <br>
                    <input type="file" class="form-control" name="image">
                </div>
            
                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>
</div>

@endsection