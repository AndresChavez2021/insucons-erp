@extends('adminlte::page')

@section('title', 'INSUCONS')

@section('content_header')
    <h1>mostrar material</h1>
@stop

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('admin.materiales.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">
                    
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $materiales->nombre }}
                    </div>
                    <div class="form-group">
                        <strong>Descripcion:</strong>
                        {{ $materiales->descripcion }}
                    </div>
                    <div class="form-group">
                        <strong>Precio:</strong>
                        {{ $materiales->precio }}
                    </div>
                    <div class="form-group">
                        <strong>Medida:</strong>
                        {{ $materiales->medida->unidad }}
                    </div>
                    <div class="form-group">
                        <strong>Marca:</strong>
                        {{ $materiales->marca->nombre }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@stop
