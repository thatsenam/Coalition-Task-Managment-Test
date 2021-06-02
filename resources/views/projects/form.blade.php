
<div class="form-group">
    <div class="col-md-10">
        <label for="name">Name</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" id="name" value="{{ old('name', optional($project)->name) }}" minlength="1" maxlength="255" data=" required="true""  placeholder="Enter name here...">

            {!! $errors->first('name', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="description">Description</label>


            <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1" maxlength="1000" required="true">{{ old('description', optional($project)->description) }}</textarea>
            {!! $errors->first('description', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

