@extends('adminlte::page')

@section('title', 'INSUCONS')

@section('content_header')
    <h1>Contrato</h1>
@stop

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Show Contrato</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('admin.contratos.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <strong>Persona:</strong>
                           @foreach($personas as $persona)
                                  @if($persona->id == $cargoempleado->persona_id)
                                      {{$persona->nombre}}
                                  @endif
                            @endforeach  
                    </div>
                    <div class="form-group">
                        <strong>Fecha Inicio:</strong>
                        {{ $cargoempleado->fecha_inicio }}
                    </div>
                    <div class="form-group">
                        <strong>Fecha Fin:</strong>
                        {{ $cargoempleado->fecha_fin }}
                    </div>
                   
                    <div class="form-group">
                        <strong>Cargo:</strong>
                            @foreach($cargos as $cargo)
                                  @if($cargo->id == $cargoempleado->cargo_id)
                                      {{$cargo->nombre}}
                                   @endif
                             @endforeach 
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@stop
