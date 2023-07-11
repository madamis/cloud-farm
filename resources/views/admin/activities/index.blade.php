@extends('layouts.app')
@section('content')
{{--    Farms --}}
    <x-admin-page-title :page-title="'Activities'" :bread-crumbs="['/'=>'Home',''=>'Activities']"></x-admin-page-title>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create Farm Activities</h5>
                <!-- General Form Elements -->
                <form method="post" action="/admin/activities/">
                    <x-activity-form :activity="$activity" :parent-activities="$parentActivities" :previous-activities="$previousActivities"></x-activity-form>
                </form>
                <!-- End General Form Elements -->
            </div>
        </div>
        <x-feedback-message></x-feedback-message>
        @if($activities->count() > 0)
            <div class="card-body">
                <h5 class="card-title">Farm Activities</h5>

                <!-- Default Table -->
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Duration(Days)</th>
                        <th scope="col">Cost(Kwacha)</th>
                        <th scope="col">Parent Activity</th>
                        <th scope="col">Previous Activity</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($activities as $activity)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$activity['name']}}</td>
                            <td>{{$activity['duration']}}</td>
                            <td>{{$activity['cost']}}</td>
                            <td>{{($activity->parentActivity != null) ? $activity->parentActivity->name : ''}}</td>
                            <td>{{($activity->previousActivity != null) ? $activity->previousActivity->name : ''}}</td>
                            <td>{{ substr($activity->description, 0,20).'...' }}</td>
                            <td>
                                <a href="/admin/activities/edit/{{$activity->id}}" class="btn btn-sm btn-outline-primary"> <i class="fas fa-edit"></i> </a>
                                <button id="{{$activity->id}}" class="btn btn-sm btn-outline-danger delete-activity"> <i class="fas fa-trash"></i> </button>
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
    <x-delete-modal :model="'activity'"></x-delete-modal>
@endsection

@push('scripts')
<script>
    deleteModel('activity', '/admin/activities/');
</script>
@endpush
