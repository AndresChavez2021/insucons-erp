@extends('adminlte::page')

@section('title', 'INSUCONS')

@section('content_header')
    <h1>Nota</h1>
@stop

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        {{-- <span class="card-title">Show Nota</span> --}}
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('admin.notas.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <strong>Empleado:</strong>
                        {{ $nota->persona->nombre }}
                    </div>


                    <div class="form-group">
                        <strong>Fecha:</strong>
                        {{ $nota->fecha }}
                    </div>
                     
                    <div class="form-group">
                        <strong>Proveedor:</strong>
                        {{ $nota->proveedor->nombre }}
                    </div> 


                    <div class="form-group">
                        <strong>Descripcion:</strong>
                        {{ $nota->descripcion }}
                    </div>



                    

                </div>
            </div>
        </div>
    </div>
</section>
@stop