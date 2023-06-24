<div>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <label for="inputText" class="col-form-label">Farm Type Name</label>
                <input type="text" class="form-control" name="name" value="{{$farmType->name ?? old('name')}}">
                <x-single-input-error :$errors :name="'name'"></x-single-input-error>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <label for="inputText" class="col-form-label">Farm Unit</label>
                <input type="text" class="form-control" name="unit" value="{{$farmType->unit ?? old('unit')}}">
                <x-single-input-error :$errors :name="'unit'"></x-single-input-error>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <label for="inputText" class="col-form-label">Unit Size</label>
                <input type="text" class="form-control" name="unit_size" value="{{$farmType->unit_size ?? old('unit_size')}}">
                <x-single-input-error :$errors :name="'unit_size'"></x-single-input-error>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="inputPassword" class="col-form-label">Description</label>
            <textarea class="form-control" style="height: 100px" name="description">{{$farmType->description ?? old('description')}}</textarea>
            <x-single-input-error :$errors :name="'description'"></x-single-input-error>
        </div>
    </div>
    <div class="form-group text-end">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
