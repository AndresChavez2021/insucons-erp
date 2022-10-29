@extends('adminlte::page')

@section('title', 'INSUCONS')

@section('content_header')
    <h1>UNIDADES DE MEDIDA</h1>
@stop 

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{-- {{ __(' lista de Medida') }} --}}
                        </span>

                         <div class="float-right">
                            <a href="{{ route('admin.medidas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    
                                    <th>Unidad</th>

                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($medidas as $medida)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        
                                        <td>{{ $medida->unidad }}</td>

                                        <td>
                                            <form action="{{ route('admin.medidas.destroy',$medida->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary " href="{{ route('admin.medidas.show',$medida->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('admin.medidas.edit',$medida->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
            {!! $medidas->links() !!}
        </div>
    </div>
</div>
@stop