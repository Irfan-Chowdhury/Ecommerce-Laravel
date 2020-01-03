@extends('backend.layouts.mastertemplate')

@section('backendPageContent')
    
    <div class="container-fluid">
        <h3 class="mb-4 text-gray-800">Manage All Products</h3>

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
                                    <th scope="col">Product Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @php $i=1; @endphp
                                    @foreach ($products as $product)
                                        <tr>
                                            <td scope="row">{{ $i++ }}</td>
                                            <td>{{$product->title}}</td>
                                            <td>{{$product->category->name}}</td>
                                            {{-- <td>{{$product->brand->name}}</td> --}}
                                            <td>{{$product->quantity}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->status}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{route('editProduct',$product->id)}}" class="btn btn-primary btn-sm">Update</a>
                                                    
                                                    <form action="{{route('deleteProduct',$product->id)}}" method="POST">
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