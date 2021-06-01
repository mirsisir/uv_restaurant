
<div class="form-group">
    <div class="col-md-10">
        <label for="name">Name</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" id="name" value="{{ old('name', optional($food)->name) }}" minlength="1" maxlength="255" data=" required="true""  placeholder="Enter name here...">

            {!! $errors->first('name', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="category_id">Category</label>


            <select class="form-control" id="category_id" name="category_id" required="true">
        	    <option value="" style="display: none;" {{ old('category_id', optional($food)->category_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select category</option>
        	@foreach ($categories as $key => $category)
			    <option value="{{ $key }}" {{ old('category_id', optional($food)->category_id) == $key ? 'selected' : '' }}>
			    	{{ $category }}
			    </option>
			@endforeach
        </select>
        
            {!! $errors->first('category_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="details">Details</label>


            <textarea class="form-control" name="details" cols="50" rows="10" id="details" minlength="1" maxlength="1000">{{ old('details', optional($food)->details) }}</textarea>
            {!! $errors->first('details', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="price">Price</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" type="text" id="price" value="{{ old('price', optional($food)->price) }}" minlength="1" data=" required="true""  placeholder="Enter price here...">

            {!! $errors->first('price', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="is_offer">Is Offer</label>


            <div class="checkbox">
            <label for="is_offer_1">
            	<input id="is_offer_1" class="" name="is_offer" type="checkbox" value="1" {{ old('is_offer', optional($food)->is_offer) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

            {!! $errors->first('is_offer', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="is_special">Is Special</label>


            <div class="checkbox">
            <label for="is_special_1">
            	<input id="is_special_1" class="" name="is_special" type="checkbox" value="1" {{ old('is_special', optional($food)->is_special) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

            {!! $errors->first('is_special', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="status">Status</label>


            <div class="radio">
            <label for="status_0">
            	<input id="status_0" class="" name="status" type="radio" value="0" required="true" {{ old('status', optional($food)->status) == '0' ? 'checked' : '' }}>
                Inactive
            </label>
        </div>
        <div class="radio">
            <label for="status_1">
            	<input id="status_1" class="" name="status" type="radio" value="1" required="true" {{ old('status', optional($food)->status) == '1' ? 'checked' : '' }}>
                Active
            </label>
        </div>

            {!! $errors->first('status', '<p class="form-text text-danger">:message</p>') !!}

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

        @if (isset($food->image) && !empty($food->image))
            <div class="input-group input-width-input">
                <span class="input-group-addon">
                    <input type="checkbox" name="custom_delete_image" class="custom-delete-file" value="1" {{ old('custom_delete_image', '0') == '1' ? 'checked' : '' }}> Delete
                </span>

                <span class="input-group-addon custom-delete-file-name">
                   <img class="card" src="{{ asset('storage/'.$food->image) }}" width="200">

                </span>
            </div>
        @endif

            {!! $errors->first('image', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

