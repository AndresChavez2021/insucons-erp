@extends('adminlte::page')

@section('title', 'INSUCONS')

@section('content_header')
    <h1>crear proveedores</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Proveedore</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.proveedores.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.proveedores.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection