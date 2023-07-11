@extends('layouts.app')
@section('content')
{{--    activities --}}
    <x-admin-page-title :page-title="'activities'" :bread-crumbs="['/'=>'Home',''=>'activity']"></x-admin-page-title>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit activity</h5>
                <!-- General Form Elements -->
                <form method="post" action="/admin/activities/{{$activity->id}}">
                    @method('put')
                    <x-activity-form :activity="$activity" :parent-activities="$parentActivities"
                                     :previous-activities="$previousActivities"></x-activity-form>
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
    <x-delete-modal :model="'activity'"></x-delete-modal>
@endsection

@push('scripts')
<script>
    deleteModel('activity-type', '/admin/activities/');
</script>
@endpush
