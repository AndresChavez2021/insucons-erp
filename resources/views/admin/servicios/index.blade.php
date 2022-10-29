@extends('adminlte::page')

@section('title', 'INSUCONS')

@section('content_header')
    <h1>Lista de servicios</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Servicio') }}
                        </span>

                         <div class="float-right">
                            <a href="{{ route('admin.servicios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                              {{ __('Create New') }}
                            </a>
                          </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Precio</th>

                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($servicios as $servicio)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        
                                        <td>{{ $servicio->nombre }}</td>
                                        <td>{{ $servicio->descripcion }}</td>
                                        <td>{{ $servicio->precio  }} Bs</td>

                                        <td>
                                            <form action="{{ route('admin.servicios.destroy',$servicio->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary " href="{{ route('admin.servicios.show',$servicio->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('admin.servicios.edit',$servicio->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                            </form> 
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $servicios->links() !!}
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Materiales') }}
                        </span>

                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop