@extends('adminlte::page')

@section('title', 'INSUCONS')

@section('content_header')
    <h1>NOTAS DE ENTRADA Y SALIDA </h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            {{-- {{ __('Nota') }} --}}
                        </span>

                         <div class="float-right">
                            <a href="{{ route('admin.notas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    <th>Tipo</th>
                                    <th>Descripcion</th>
                                    <th>Fecha</th>
                                    <th>Empleado</th>
                                    <th>Proveedor</th>

                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notas as $nota)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $nota->tipo }}</td>
                                        <td>{{ $nota->descripcion }}</td>
                                        <td>{{ $nota->fecha }}</td>
                                        <td>{{ $nota->persona->nombre }}</td>
                                        <td>{{ $nota->proveedor->nombre }}</td>

                                        <td>
                                            <form action="{{ route('admin.notas.destroy',$nota->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary " href="{{ route('admin.notas.show',$nota->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('admin.notas.edit',$nota->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
            {!! $notas->links() !!}
        </div>
    </div>
</div>
@stop