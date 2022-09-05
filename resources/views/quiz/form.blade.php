<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $quiz->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('category') }}
            {{ Form::select('category_id', $categories, null,['class' => 'form-control select2' . ($errors->has('category_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('category_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::file('image', ['accept' => 'image/* ' . ($errors->has('image') ? ' is-invalid' : '')])}}
            @error('image')
                <div class="">
                    <p class="text-danger">{{ $message }}</p>
                </div>
            @enderror
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
