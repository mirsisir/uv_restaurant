
<div class="form-group">
    <div class="col-md-10">
        <label for="first_name">First Name</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('first_name') ? 'is-invalid' : '' }}" name="first_name" type="text" id="first_name" value="{{ old('first_name', optional($order)->first_name) }}" minlength="1" data=" required="true""  placeholder="Enter first name here...">

            {!! $errors->first('first_name', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="last_name">Last Name</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('last_name') ? 'is-invalid' : '' }}" name="last_name" type="text" id="last_name" value="{{ old('last_name', optional($order)->last_name) }}" minlength="1" data=" required="true""  placeholder="Enter last name here...">

            {!! $errors->first('last_name', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="address">Address</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" type="text" id="address" value="{{ old('address', optional($order)->address) }}" minlength="1" data=" required="true""  placeholder="Enter address here...">

            {!! $errors->first('address', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="phone">Phone</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone" type="text" id="phone" value="{{ old('phone', optional($order)->phone) }}" minlength="1" data=" required="true""  placeholder="Enter phone here...">

            {!! $errors->first('phone', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="email">Email</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" type="email" id="email" value="{{ old('email', optional($order)->email) }}" data=""  placeholder="Enter email here...">

            {!! $errors->first('email', '<p class="form-text text-danger">:message</p>') !!}

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
        <label for="payment_type">Payment Type</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('payment_type') ? 'is-invalid' : '' }}" name="payment_type" type="text" id="payment_type" value="{{ old('payment_type', optional($order)->payment_type) }}" minlength="1" data=""  placeholder="Enter payment type here...">

            {!! $errors->first('payment_type', '<p class="form-text text-danger">:message</p>') !!}

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

<div class="form-group">
    <div class="col-md-10">
        <label for="status">Status</label>


            <select class="form-control" id="status" name="status">
        	    <option value="" style="display: none;" {{ old('status', optional($order)->status ?: '') == '' ? 'selected' : '' }} disabled selected>Enter status here...</option>
        	@foreach (['pending' => 'Pending',
'Hold' => 'Hold',
'Accepted' => 'Accepted',
'Canceled' => 'Canceled',
'Delivered' => 'Delivered'] as $key => $text)
			    <option value="{{ $key }}" {{ old('status', optional($order)->status) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>

            {!! $errors->first('status', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

