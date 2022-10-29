@extends('adminlte::page')

@section('title', 'INSUCONS')

@section('content_header')
    <h1>Servicio</h1>
@stop

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Show Servicio</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('admin.servicios.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">
                    
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $servicios->nombre }}
                    </div>
                    <div class="form-group">
                        <strong>Descripcion:</strong>
                        {{ $servicios->descripcion }}
                    </div>
                    <div class="form-group">
                        <strong>Precio:</strong>
                        {{ $servicios->precio }} Bs
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@stop