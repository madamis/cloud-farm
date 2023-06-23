@extends('layouts.app')
@section('content')
{{--    Farms --}}
    <x-admin-page-title :page-title="'Farms'" :bread-crumbs="['/'=>'Home',''=>'Farm']"></x-admin-page-title>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create Farm Type</h5>

                <!-- General Form Elements -->
                <form method="post" action="/admin/farm_types/">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="inputText" class="col-form-label">Farm Type Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="inputText" class="col-form-label">Farm Unit</label>
                                <input type="text" class="form-control" name="unit">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="inputText" class="col-form-label">Unit Size</label>
                                <input type="text" class="form-control" name="unit_size">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="inputPassword" class="col-form-label">Description</label>
                            <textarea class="form-control" style="height: 100px" name="description"></textarea>
                        </div>
                    </div>
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form><!-- End General Form Elements -->

            </div>
        </div>

        @if($farm_types->count() > 0)
            <div class="card-body">
                <h5 class="card-title">Farm Types</h5>

                <!-- Default Table -->
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Unit Size</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Updated</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($farm_types as $farm_type)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$farm_type['name']}}</td>
                            <td>{{$farm_type['unit_size']}}</td>
                            <td>{{$farm_type['unit']}}</td>
                            <td>{{$farm_type['updated_at']}}</td>
                            <td>
                                <button class="btn btn-sm btn-primary"> <i class="fas fa-trash"></i> </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- End Default Table Example -->
            </div>
        @endif
    </section>
@endsection

@section('modals')
    <x-delete-modal></x-delete-modal>
@endsection

@push('scripts')
<script>
    $('ready', function (){
        console.log('ready')
    })
</script>
@endpush
