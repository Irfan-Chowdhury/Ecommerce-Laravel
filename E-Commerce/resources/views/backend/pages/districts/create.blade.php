@extends('backend.layouts.mastertemplate')

@section('backendPageContent')

<div class="container">
    <h1 class="text-center pt-5">Add New District</h1>

    {{-- --------- Check in Session Message -------- --}}
            @include('backend.allinfo.message')
    {{-- ------------------------------------------- --}}

    <div class="row">
        <div class="col-6">
            <form action="{{route('admin.districts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf 
                
                <div class="form-group">
                    <label for="name">District Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="District Name" value="{{ old('name') }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="priority">Priority</label>
                    <input type="number" class="form-control @error('priority') is-invalid @enderror" name="priority"  placeholder="Prioty Number for The Display List" value="{{ old('priority') }}">
                    @error('priority')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>

@endsection