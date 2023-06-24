@if(session()->has('feedback'))
    <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
        {{session('feedback')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
