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
                    <x-farm-type-form :farm-type="$farmType"></x-farm-type-form>
                </form><!-- End General Form Elements -->

            </div>
        </div>
        <x-feedback-message></x-feedback-message>
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
                        <th scope="col">Activities</th>
                        <th scope="col">Description</th>
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
                            <td>{{$farm_type->activities()->count()}}</td>
                            <td>{{ substr($farm_type->description, 0,30).'...' }}</td>
                            <td>
                                <a href="/admin/farm_types/activities/{{$farm_type->id}}" class="btn btn-sm btn-outline-primary"> <i class="fas fa-cog"></i> </a>
                                <a href="/admin/farm_types/edit/{{$farm_type->id}}" class="btn btn-sm btn-outline-primary"> <i class="fas fa-edit"></i> </a>
                                <button id="{{$farm_type->id}}" class="btn btn-sm btn-outline-danger delete-farm-type"> <i class="fas fa-trash"></i> </button>
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
    <x-delete-modal :model="'farm-type'"></x-delete-modal>
@endsection

@push('scripts')
<script>
    deleteModel('farm-type', '/admin/farm_types/');
</script>
@endpush
