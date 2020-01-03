@extends('backend.layouts.mastertemplate')

@section('backendPageContent')

<div class="container">
    <h1 class="text-center pt-5">Add New Category</h1>

    <div class="row">
        <div class="col-6">
            <form action="{{route('admin.Categories.storeCategory')}}" method="POST" enctype="multipart/form-data">
                @include('backend.allinfo.message')
                @csrf 
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" name="name"  placeholder="Category Name">
                </div>
            
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" rows="5" name="description" id="description"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="parent_id">Parent Category</label>
                    <select name="parent_id" id="parent_id" class="form-control">
                        <option value="">---Please Select---</option>
                        @foreach ($primary_categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
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