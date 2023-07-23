@extends('layouts.app')
@section('content')
{{--    Farms --}}
    <x-admin-page-title :page-title="'Farms'" :bread-crumbs="['/'=>'Home',''=>'Farm']"></x-admin-page-title>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Details for {{$farm->name}}</h3>
                <h5 class="text-gray">{{ $farm->farmType->name }}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <x-dashboard-tile :title="'Farm Size'" :sub-title="''" :value="$farm->size()"></x-dashboard-tile>
            </div>
            <div class="col-sm-3">
                <x-dashboard-tile :title="'Completion Time'" :sub-title="'Duration'" :value="$farm->endDate().' ('.$farm->totalDays().' days)'"></x-dashboard-tile>
            </div>
            <div class="col-sm-3">
                <x-dashboard-tile :title="'Projected Inputs'" :sub-title="'costs'" :value="$farm->projectedCosts()"></x-dashboard-tile>
            </div>
            <div class="col-sm-3">
                <x-dashboard-tile :title="'Actual Sales'" :sub-title="'costs'" :value="'600 000'"></x-dashboard-tile>
            </div>
        </div>
        @if(session()->has('success-message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success-message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if($farm->activities()->count() > 0)
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
                        <th scope="col" colspan="2" class="text-end">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($farm->farmActivities as $activityFarm)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{ $activityFarm->activity->name }}</td>
                            <td>{{ $activityFarm->farmActivityCost($farm->unit_size_multiplier) }}</td>
                            <td>{{ $activityFarm->activity->duration  }}</td>
                            <td>{{ $activityFarm->activity->description }}</td>
                            <td class="text-end">{{ $activityFarm->calculateStartDate($farm->startDate()) }}</td>
                            <td class="text-end">{{ $activityFarm->calculateEndDate($farm->startDate()) }}</td>
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
    deleteModel('farm-type', '/admin/farms/');
</script>
@endpush
