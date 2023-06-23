<div class="pagetitle">
    <h1>{{$pageTitle}}</h1>
    <nav>
        <ol class="breadcrumb">
            @foreach($breadCrumbs as $bread_key => $bread_value)
                @if($bread_key == '')
                    <li class="breadcrumb-item active">{{$bread_value}}</li>
                @else
                    <li class="breadcrumb-item"><a href="{{$bread_key}}">{{$bread_value}}</a></li>
                @endif
            @endforeach
        </ol>
    </nav>
</div><!-- End Page Title -->
