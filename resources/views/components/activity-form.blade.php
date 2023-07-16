<div>
    <!-- Very little is needed to make a happy life. - Marcus Aurelius -->
    @csrf
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <label for="inputText" class="col-form-label">Farm Activity Name</label>
                <input type="text" class="form-control" name="name" value="{{$activity->name ?? old('name')}}">
                <x-single-input-error :$errors :name="'name'"></x-single-input-error>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <label for="inputText" class="col-form-label">Duration(Days)</label>
                <input type="text" class="form-control" name="duration" value="{{$activity->duration ?? old('duration')}}">
                <x-single-input-error :$errors :name="'duration'"></x-single-input-error>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <label for="inputText" class="col-form-label">Cost(Kwacha)</label>
                <input type="text" class="form-control" name="cost" value="{{$activity->cost ?? old('cost')}}">
                <x-single-input-error :$errors :name="'cost'"></x-single-input-error>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label for="inputText" class="col-form-label">Parent Activity</label>
                <select class="form-select select2" aria-label="Default select example" name="parent_activity">
                    <option value="" selected>Parent activity</option>
                    @foreach($parentActivities as $parentActivity)
                        <option value="{{$parentActivity->id}}" {{ (($activity->parent_activity != null) and
                            ($parentActivity->id == $activity->parent_activity)) ? 'selected':'' }}>{{$parentActivity->name}}</option>
                    @endforeach
                </select>
                <x-single-input-error :$errors :name="'farm_type_id'"></x-single-input-error>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label for="inputText" class="col-form-label">Previous Activity</label>
                <select class="form-select select2" aria-label="Default select example" name="previous_activity">
                    <option value="" selected>Previous activity</option>
                    @foreach($previousActivities as $previousActivity)
                        <option value="{{$previousActivity->id}}" {{ (($activity->previous_activity != null) and
                        ($previousActivity->id == $activity->previous_activity)) ? 'selected':'' }}>{{$previousActivity->name}}</option>
                    @endforeach
                </select>
                <x-single-input-error :$errors :name="'farm_type_id'"></x-single-input-error>
            </div>
        </div>
    </div>
    <div class="form-group mb-3">
        <label for="inputPassword" class="col-form-label">Description</label>
        <textarea class="form-control" style="height: 100px" name="description">{{$activity->description ?? old('description')}}</textarea>
        <x-single-input-error :$errors :name="'description'"></x-single-input-error>
    </div>
    <div class="form-group text-end">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
