<div class="form-group">
    <div class="col-md-10">
        <label for="project_id">Project</label>


        <select class="form-control" id="project_id" name="project_id">
            <option value="" style="display: none;"
                    {{ old('project_id', optional($task)->project_id ?: '') == '' ? 'selected' : '' }} disabled
                    selected>Select project
            </option>
            @foreach ($projects as $key => $project)
                <option
                    value="{{ $key }}" {{ old('project_id', optional($task)->project_id) == $key ? 'selected' : '' }}>
                    {{ $project }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('project_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="name">Name</label>


        <span class="text-danger font-bolder">*</span>
        <input class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" id="name"
               value="{{ old('name', optional($task)->name) }}" minlength="1" maxlength="255" data=" required=" true""
        placeholder="Enter name here...">

        {!! $errors->first('name', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="description">Description</label>


        <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1"
                  maxlength="1000">{{ old('description', optional($task)->description) }}</textarea>
        {!! $errors->first('description', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="is_completed">Is Completed</label>


        <div class="checkbox">
            <label for="is_completed_1">
                <input id="is_completed_1" class="" name="is_completed" type="checkbox"
                       value="1" {{ old('is_completed', optional($task)->is_completed) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>
        {!! $errors->first('is_completed', '<p class="form-text text-danger">:message</p>') !!}
    </div>
</div>


