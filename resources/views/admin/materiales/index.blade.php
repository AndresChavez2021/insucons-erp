@extends('adminlte::page')

@section('title', 'INSUCONS')

@section('content_header')
    <h1>listas de materiales</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Materiale') }}
                        </span>

                         <div class="float-right">
                            <a href="{{ route('admin.materiales.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    <th>Medida </th>
                                    <th>Marca </th>

                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($materiales as $materiale)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        
                                        <td>{{ $materiale->nombre }}</td>
                                        <td>{{ $materiale->descripcion }}</td>
                                        <td>{{ $materiale->precio }}</td>
                                        <td>{{ $materiale->medida->unidad }}</td>  {{-- si me salio xdxd --}}
                                        <td>{{ $materiale->marca->nombre }}</td>

                                        <td>
                                            <form action="{{ route('admin.materiales.destroy',$materiale->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary " href="{{ route('admin.materiales.show',$materiale->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('admin.materiales.edit',$materiale ->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
            {!! $materiales->links() !!}
        </div>
    </div>
</div>
@stop
