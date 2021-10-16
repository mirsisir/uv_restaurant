
<div class="form-group">
    <div class="col-md-10">
        <label for="name">Name</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" id="name" value="{{ old('name', optional($reservation)->name) }}" minlength="1" maxlength="255" data=" required="true""  placeholder="Enter name here...">

            {!! $errors->first('name', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="email">Email</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" type="text" id="email" value="{{ old('email', optional($reservation)->email) }}" minlength="1" maxlength="255" data=" required="true""  placeholder="Enter email here...">

            {!! $errors->first('email', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="phone">Phone</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone" type="text" id="phone" value="{{ old('phone', optional($reservation)->phone) }}" minlength="1" maxlength="255" data=" required="true""  placeholder="Enter phone here...">

            {!! $errors->first('phone', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="date">Date</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('date') ? 'is-invalid' : '' }}" name="date" type="text" id="date" value="{{ old('date', optional($reservation)->date) }}" minlength="1" maxlength="255" data=" required="true""  placeholder="Enter date here...">

            {!! $errors->first('date', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="time">Time</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('time') ? 'is-invalid' : '' }}" name="time" type="text" id="time" value="{{ old('time', optional($reservation)->time) }}" minlength="1" maxlength="255" data=" required="true""  placeholder="Enter time here...">

            {!! $errors->first('time', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="guest">Guest</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('guest') ? 'is-invalid' : '' }}" name="guest" type="text" id="guest" value="{{ old('guest', optional($reservation)->guest) }}" minlength="1" maxlength="255" data=" required="true""  placeholder="Enter guest here...">

            {!! $errors->first('guest', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="accept">Accept</label>


            <div class="checkbox">
            <label for="accept_1">
            	<input id="accept_1" class="" name="accept" type="checkbox" value="1" {{ old('accept', optional($reservation)->accept) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

            {!! $errors->first('accept', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="table_no">Table No</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('table_no') ? 'is-invalid' : '' }}" name="table_no" type="text" id="table_no" value="{{ old('table_no', optional($reservation)->table_no) }}" maxlength="255" data=""  placeholder="Enter table no here...">

            {!! $errors->first('table_no', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

