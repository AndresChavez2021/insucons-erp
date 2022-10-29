@extends('adminlte::page')

@section('title', 'INSUCONS')

@section('content_header')
    <h1>editar contrato</h1>
@stop

@section('content')
<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Update Contrato</span>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('admin.contratos.index') }}"> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.contratos.update', $cargoempleado->id) }}"  role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('admin.cargoempleados.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop