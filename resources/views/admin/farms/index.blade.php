@extends('layouts.app')
@section('content')
{{--    Farms --}}
    <x-admin-page-title :page-title="'Farms'" :bread-crumbs="['/'=>'Home',''=>'Farm']"></x-admin-page-title>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create Farm Type</h5>
                <!-- General Form Elements -->
                <form method="post" action="/admin/farms/">
                    @csrf
                    <x-farm-form :farm="$farm" :farm-types="$farmTypes"></x-farm-form>
                </form>
                <!-- End General Form Elements -->
            </div>
        </div>
        <x-feedback-message></x-feedback-message>
        @if($farms->count() > 0)
            <div class="card-body">
                <h5 class="card-title">My Farm Businesses </h5>

                <!-- Default Table -->
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Farm Type</th>
                        <th scope="col">Farm Size</th>
                        <th scope="col">Description</th>
                        <th scope="col" class="text-end">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($farms as $farm)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$farm['name']}}</td>
                            <td>{{$farm->farm_type->name}}</td>
                            <td>{{$farm->size()}}</td>
                            <td>{{ substr($farm->description, 0,30).'...' }}</td>
                            <td class="text-end">
                                <a href="/admin/farms/{{$farm->id}}" class="btn btn-sm btn-outline-primary"> <i class="fas fa-eye"></i> </a>
                                <a href="/admin/farms/edit/{{$farm->id}}" class="btn btn-sm btn-outline-primary"> <i class="fas fa-edit"></i> </a>
                                <button id="{{$farm->id}}" class="btn btn-sm btn-outline-danger delete-farm"> <i class="fas fa-trash"></i> </button>
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
    <x-delete-modal :model="'farm'"></x-delete-modal>
@endsection

@push('scripts')
<script>
    deleteModel('farm', '/admin/farms/');
</script>
@endpush
