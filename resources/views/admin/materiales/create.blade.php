@extends('adminlte::page')

@section('title', 'INSUCONS')

@section('content_header')
    <h1>agregar nuevo material</h1>
@stop

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Create Material</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.materiales.store') }}"  role="form" enctype="multipart/form-data">
                        @csrf

                        @include('admin.materiales.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
