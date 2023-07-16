@extends('layouts.app')
@section('content')
{{--    Farms --}}
    <x-admin-page-title :page-title="$farmType->name" :bread-crumbs="['/'=>'Home',''=>'Farm']"></x-admin-page-title>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$farmType->name }} Farm Activities</h5>

                <form action="/admin/farm_types/activities/{{$farmType->id}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="inputText" class="col-form-label">Activity</label>
                                <select class="form-select select2" aria-label="Default select example" name="activity">
                                    <option value="" selected>Select Activity</option>
                                    @foreach($possibleActivities as $possibleActivity)
                                        <option value="{{$possibleActivity->id}}" {{ ($possibleActivity->id == old('activity')) ? 'selected':'' }}>{{$possibleActivity->name}}</option>
                                    @endforeach
                                </select>
                                <x-single-input-error :$errors :name="'activity'"></x-single-input-error>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="inputText" class="col-form-label">Farm Activity Cost</label>
                                <input type="text" class="form-control" name="cost" value="{{old('cost') ?? ''}}">
                                <x-single-input-error :$errors :name="'cost'"></x-single-input-error>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-3">
                                <label for="inputPassword" class="col-form-label">Description</label>
                                <textarea class="form-control" style="height: 100px" name="description">{{old('description') ?? ''}}</textarea>
                                <x-single-input-error :$errors :name="'description'"></x-single-input-error>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        @if(session()->has('feedback'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('feedback')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if($farmType->farmTypeActivities()->count() > 0)
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

                    @foreach($farmType->farmTypeActivities as $farmTypeActivity)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$farmTypeActivity->activity->name}}</td>
                            <td>{{$farmTypeActivity->activity->duration}}</td>
                            <td>{{$farmTypeActivity->activity->cost}}</td>
                            <td>{{($farmTypeActivity->activity->parentActivity != null) ? $farmTypeActivity->activity->parentActivity->name : ''}}</td>
                            <td>{{($farmTypeActivity->activity->previousActivity != null) ? $farmTypeActivity->activity->previousActivity->name : ''}}</td>
                            <td>{{ substr($farmTypeActivity->activity->description, 0,20).'...' }}</td>
                            <td class="text-end">
                                <form action="/admin/farm-type-activities/move" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="farm_type_activity" value="{{$farmTypeActivity->id}}">
                                    @if(!$loop->first)
                                        <button type="submit" name="movement" value="UP" class="btn btn-sm btn-outline-primary"> <i class="fas fa-arrow-up"></i> </button>
                                    @endif

                                    @if(!$loop->last)
                                        <button type="submit" name="movement" value="DOWN" class="btn btn-sm btn-outline-primary"> <i class="fas fa-arrow-down"></i> </button>
                                        @endif

                                    <button type="button" id="{{$farmTypeActivity->id}}" class="btn btn-sm btn-outline-danger delete-farm-type-activity">
                                        <i class="fas fa-trash"></i> </button>
                                </form>
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
    <x-delete-modal :model="'farm-type-activity'"></x-delete-modal>
@endsection

@push('scripts')
<script>
    deleteModel('farm-type-activity', '/admin/farm_types/activities/');
</script>
@endpush
