@extends('adminlte::page')

@section('title', 'INSUCONS')

@section('content_header')
    <h1>Crear servicio</h1>
@stop

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Create Servicio</span>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('admin.servicios.index') }}"> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.servicios.store') }}"  role="form" enctype="multipart/form-data">
                        @csrf

                        @include('admin.servicios.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop