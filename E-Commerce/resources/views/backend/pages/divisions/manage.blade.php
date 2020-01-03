@extends('backend.layouts.mastertemplate')

@section('backendPageContent')
    
    <div class="container">
        <h3 class="mb-4 text-gray-800 text-center pt-5">Manage All Divisions</h3>

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
                                    <th scope="col">Division Name</th>
                                    <th scope="col">Priority</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($divisions as $key => $division)
                                        <tr>
                                            <td scope="row">{{ $key+1 }}</td>
                                            <td>{{$division->name}}</td>
                                            <td>{{$division->priority}}</td>
                                                
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{route('admin.divisions.edit',$division->id)}}" class="btn btn-primary btn-sm">Update</a>
                                                    
                                                    <form action="{{route('admin.divisions.delete',$division->id)}}" method="POST">
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