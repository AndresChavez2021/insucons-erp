@extends('adminlte::page')

@section('title', 'INSUCONS')



@section('content')

<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">{{ $proveedore->nombre?? 'Show Proveedore' }}</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('admin.proveedores.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">
                    
                    <div class="form-group">
                        <strong>Nit:</strong>
                        {{ $proveedore->nit }}
                    </div>
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $proveedore->nombre }}
                    </div>
                    <div class="form-group">
                        <strong>Telefono:</strong>
                        {{ $proveedore->telefono }}
                    </div>
                    <div class="form-group">
                        <strong>Direccion:</strong>
                        {{ $proveedore->direccion }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@stop