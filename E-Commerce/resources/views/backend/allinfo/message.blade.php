{{-- --------- Check in Session Message -------- --}}
@if (session()->has('message'))  
    <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
        <strong>{{ session('message')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif 
{{-- ---------------- X -------------------- --}}

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



@if (Session::has('errors'))
    <div class="alert alert-danger">
        <p>{{Session::get('errors')}}</p>
    </div>
@endif --}}

{{-- @if (Session::has('message'))
    <div class="alert alert-success">
        <p>{{Session::get('message')}}</p>
    </div>
@endif --}}

