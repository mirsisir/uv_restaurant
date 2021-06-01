
<div class="form-group">
    <div class="col-md-10">
        <label for="name">Name</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" id="name" value="{{ old('name', optional($category)->name) }}" minlength="1" maxlength="255"   placeholder="Enter name here...">

            {!! $errors->first('name', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="details">Details</label>


            <textarea class="form-control" name="details" cols="50" rows="10" id="details" minlength="1" maxlength="1000">{{ old('details', optional($category)->details) }}</textarea>
            {!! $errors->first('details', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="status">Status</label>


            <div class="radio">
            <label for="status_0">
            	<input id="status_0" class="" name="status" type="radio" value="0"  {{ old('status', optional($category)->status) == '0' ? 'checked' : '' }}>
                Inactive
            </label>
        </div>
        <div class="radio">
            <label for="status_1">
            	<input id="status_1" class="" name="status" type="radio" value="1"  {{ old('status', optional($category)->status) == '1' ? 'checked' : '' }}>
                Active
            </label>
        </div>

            {!! $errors->first('status', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="is_special">Is Special</label>


            <div class="checkbox">
            <label for="is_special_1">
            	<input id="is_special_1" class="" name="is_special" type="checkbox" value="1" {{ old('is_special', optional($category)->is_special) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

            {!! $errors->first('is_special', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="image">Image</label>


            <div class="input-group uploaded-file-group">
            <label class="input-group-btn">
                <span class="btn btn-default">
                     <input type="file" name="image" id="image" class="form-control-file">
                </span>
            </label>
            <input type="text" class="form-control uploaded-file-name" hidden>
        </div>

        @if (isset($category->image) && !empty($category->image))
            <div class="input-group input-width-input">
                <span class="input-group-addon">
                    <input type="checkbox" name="custom_delete_image" class="custom-delete-file" value="1" {{ old('custom_delete_image', '0') == '1' ? 'checked' : '' }}> Delete
                </span>

                <span class="input-group-addon custom-delete-file-name">
                   <img class="card" src="{{ asset('storage/'.$category->image) }}" width="200">

                </span>
            </div>
        @endif

            {!! $errors->first('image', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

