@extends('adminlte::page')

@section('title','INSUCONS')

{{-- @section('content_header')
    <h1>mostrar cargo</h1>
@stop --}}

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Cargo</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('admin.cargos.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">
                    
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $cargo->nombre }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@stop