@extends('layouts.app')
@section('content')
{{--    Farms --}}
    <x-admin-page-title :page-title="'Farms'" :bread-crumbs="['/'=>'Home',''=>'Farm']"></x-admin-page-title>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Farm Type</h5>
                <!-- General Form Elements -->
                <form method="post" action="/admin/farm_types/{{$farmType->id}}">
                    @csrf
                    @method('put')
                    <x-farm-type-form :farm-type="$farmType"></x-farm-type-form>
                </form><!-- End General Form Elements -->

            </div>
        </div>
        @if(session()->has('success-message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success-message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
