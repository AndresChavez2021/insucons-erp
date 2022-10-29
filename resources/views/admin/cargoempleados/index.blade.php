@extends('adminlte::page')

@section('title', 'INSUCONS')

@section('content_header')
    <h1>lista de contratos</h1>
@stop

@section('content')
 <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Cargoempleado') }}
                        </span>

                         <div class="float-right">
                            <a href="{{ route('admin.contratos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Persona</th>
                                    <th>Cargo</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cargoempleados as $cargoempleado)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        
                                        <td>{{ $cargoempleado->fecha_inicio }}</td>
                                        <td>{{ $cargoempleado->fecha_fin }}</td>
                                        <td>
                                            @foreach($personas as $persona)
                                            @if($persona->id == $cargoempleado->persona_id)
                                            {{$persona->nombre}}
                                            @endif
                                        @endforeach    
                                        </td>
                                        <td> @foreach($cargos as $cargo)
                                            @if($cargo->id == $cargoempleado->cargo_id)
                                            {{$cargo->nombre}}
                                            @endif
                                        @endforeach </td>

                                        <td width="10px">
                                             <form action="{{ route('admin.contratos.destroy',$cargoempleado->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary " href="{{ route('admin.contratos.show',$cargoempleado->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('admin.contratos.edit',$cargoempleado->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
            {!! $cargoempleados->links() !!}
        </div>
    </div>
</div> 
@stop