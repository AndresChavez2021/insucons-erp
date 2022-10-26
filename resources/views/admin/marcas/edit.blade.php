@extends('adminlte::page')

@section('title', 'Dueño')

@section('content_header')
<h1>Editar Marca</h1>
@stop

@section('content')

@if(session('info'))
    <div class="alert alert-success">
        <strong> {{session('info')}}</strong>
    </div>
@endif

<div class="card">
    <div class="card-body">
            
        {!! Form::model($marca,['route' => ['admin.marcas.update', $marca], 'method' => 'put', 'autocomplete' => 'off']) !!}

            <div class="row">
                    <label for="id" class="col-sm-1 col-form-label">ID:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="id" value="{{$marca->id}}" readonly>
                        </div>
            </div>

            <br>

            <div class="row">
                <label for="nombre" class="col-sm-1 col-form-label">Nombre:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="nombre" value="{{$marca->nombre}}" autofocus>
                        @error('nombre')
                        <strong class="text-danger">{{ $message }}</strong>               
                        @enderror
                    </div>
            </div>

            <br>

            <button class="btn btn-primary" type="submit" rel="tooltip">
                <i class="material-icons fa fa-save"> Guardar</i>
            </button>

        {!! Form::close() !!}

        <br>
        <div class="form-group">
            <a class="btn btn-danger" href="{{route('admin.marcas.index')}}">
                <i class="fa fa-arrow-left"> Atras</i>
            </a>   
        </div>

    </div>
</div>


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@livewireStyles
@stop

@section('js')
<script>console.log('hi!')</script>
@livewireScripts
@stop
