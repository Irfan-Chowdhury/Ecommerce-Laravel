@extends('backend.layouts.mastertemplate')

@section('backendPageContent')
    
    <div class="container-fluid">
        <h3 class="mb-4 text-gray-800">Manage All Brands</h3>

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
                                    <th scope="col">SL</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Thumbnail</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $key => $brand)
                                        <tr>
                                            <td scope="row">{{ $key+1 }}</td>
                                            <td>{{$brand->name}}</td>
                                            <td>{{$brand->desc}}</td>
                                            <td>
                                                @if (isset($brand->image))
                                                    <img src="{{url('image/brand-image',$brand->image)}}" height="50px" width="50px"></td>
                                                @else
                                                   <p>No Image</p> 
                                                @endif
                                                
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{route('admin.brand.edit',$brand->id)}}" class="btn btn-primary btn-sm">Update</a>
                                                    
                                                    <form action="{{route('admin.brand.delete',$brand->id)}}" method="POST">
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