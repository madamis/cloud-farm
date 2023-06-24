<div>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <label for="inputText" class="col-form-label">Farm Name</label>
                <input type="text" class="form-control" name="name" value="{{$farm->name ?? old('name')}}">
                <x-single-input-error :$errors :name="'name'"></x-single-input-error>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <label for="inputText" class="col-form-label">Farm Type</label>
                <select class="form-select select2" aria-label="Default select example" name="farm_type_id">
                    <option selected="">Open this select menu</option>
                    @foreach($farmTypes as $farmType)
                        <option value="{{$farmType->id}}">{{$farmType->name}}</option>
                    @endforeach
                </select>
                <x-single-input-error :$errors :name="'farm_type_id'"></x-single-input-error>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <label for="inputText" class="col-form-label">Unit Size Multiplier</label>
                <input type="text" class="form-control" name="unit_size_multiplier" value="{{$farm->unit_size_multiplier ?? old('unit_size')}}">
                <x-single-input-error :$errors :name="'unit_size_multiplier'"></x-single-input-error>
            </div>
        </div>
    </div>
    <div class="form-group text-end">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
