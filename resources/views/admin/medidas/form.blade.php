<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('unidad') }}
            {{ Form::text('unidad', $medidas->unidad, ['class' => 'form-control' . ($errors->has('unidad') ? ' is-invalid' : ''), 'placeholder' => 'Unidad']) }}
            {!! $errors->first('unidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>