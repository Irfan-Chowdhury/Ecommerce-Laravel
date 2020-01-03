@extends('backend.layouts.mastertemplate')

@section('backendPageContent')
    
    <div class="container-fluid">
        <h3 class="mb-4 text-gray-800">Manage All Categories</h3>

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            View / Update / Delete Indivisual / Products
                        </h6>

                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Parent</th>
                                    <th scope="col">Thumbnail</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    {{-- @php $i=1; @endphp --}}
                                    @foreach ($categories as $key => $category)
                                        <tr>
                                            <td scope="row">{{ $key+1 }}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->description}}</td>
                                            <td>
                                                @if ($category->parent_id == NULL)
                                                    Primary Category
                                                @else
                                                    {{$category->parent->name}}
                                                @endif
                                            </td>
                                            <td><img src="{{url('image/category-image',$category->image)}}" height="50px" width="50px"></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{route('editCategory',$category->id)}}" class="btn btn-primary btn-sm">Update</a>
                                                    
                                                    <form action="{{route('deleteCategory',$category->id)}}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="ml-2 btn btn-danger btn-sm" onclick="return confirm('are you sure ?')">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                  
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection