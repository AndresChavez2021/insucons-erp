@extends('adminlte::page')

@section('title', 'INSUCONS')

@section('content_header')
    <h1>lista de proveedores</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                       <span id="card_title">
                            {{ __('Proveedores') }}
                       </span>

                       <div class="float-right">
                         <a href="{{ route('admin.proveedores.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Nit</th>
										<th>Nombre</th>
										<th>Telefono</th>
										<th>Direccion</th>
										<th>Acciones</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proveedores as $proveedore)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $proveedore->nit }}</td>
											<td>{{ $proveedore->nombre }}</td>
											<td>{{ $proveedore->telefono }}</td>
											<td>{{ $proveedore->direccion }}</td>

                                            <td>
                                                 <form action="{{ route('admin.proveedores.destroy',$proveedore->id) }}" method="POST"> 
                                                    <a class="btn btn-sm btn-primary " href="{{ route('admin.proveedores.show',$proveedore->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> 
                                                    <a class="btn btn-sm btn-success" href="{{ route('admin.proveedores.edit',$proveedore->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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

            </div>
        </div>
    </div>
</div>
@stop

                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('proveedores.show',$proveedore->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
