<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('fecha_inicio') }}
            {{ Form::date('fecha_inicio', $cargoempleado->fecha_inicio, ['class' => 'form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Inicio']) }}
            {!! $errors->first('fecha_inicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_fin') }}
            {{ Form::date('fecha_fin', $cargoempleado->fecha_fin, ['class' => 'form-control' . ($errors->has('fecha_fin') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Fin']) }}
            {!! $errors->first('fecha_fin', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('persona_id') }}
            {{ Form::select('persona_id', $personas, $cargoempleado->persona_id, ['class' => 'form-control' . ($errors->has('persona_id') ? ' is-invalid' : ''), 'placeholder' => 'Empleado']) }}
            {!! $errors->first('persona_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cargo_id') }}
            {{ Form::select('cargo_id',$cargos ,$cargoempleado->cargo_id, ['class' => 'form-control' . ($errors->has('cargo_id') ? ' is-invalid' : ''), 'placeholder' => 'Cargo Id']) }}
            {!! $errors->first('cargo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div> 

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>