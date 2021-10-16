
<div class="form-group">
    <div class="col-md-10">
        <label for="user_id">Customer</label>


            <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($order)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($order)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
            {!! $errors->first('user_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="total">Total</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('total') ? 'is-invalid' : '' }}" name="total" type="number" id="total" value="{{ old('total', optional($order)->total) }}" data=""  placeholder="Enter total here...">

            {!! $errors->first('total', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="discount">Discount</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('discount') ? 'is-invalid' : '' }}" name="discount" type="number" id="discount" value="{{ old('discount', optional($order)->discount) }}" data=""  placeholder="Enter discount here...">

            {!! $errors->first('discount', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="payment">Payment</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('payment') ? 'is-invalid' : '' }}" name="payment" type="text" id="payment" value="{{ old('payment', optional($order)->payment) }}" minlength="1" data=""  placeholder="Enter payment here...">

            {!! $errors->first('payment', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="status">Status</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" type="text" id="status" value="{{ old('status', optional($order)->status) }}" minlength="1" data=""  placeholder="Enter status here...">

            {!! $errors->first('status', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="is_paid">Is Paid</label>


            <div class="checkbox">
            <label for="is_paid_1">
            	<input id="is_paid_1" class="" name="is_paid" type="checkbox" value="1" {{ old('is_paid', optional($order)->is_paid) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

            {!! $errors->first('is_paid', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

