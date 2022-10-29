@extends('adminlte::page')

@section('title', 'INSUCONS')

@section('content_header')
    <h1>UNIDAD DE MEDIDA</h1>
@stop

@section('content')
 
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        {{-- <span class="card-title">Show Medida</span> --}}
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('admin.medidas.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">
                    
                    <div class="form-group">
                        <strong>Unidad:</strong>
                        {{ $medidas->unidad }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@stop