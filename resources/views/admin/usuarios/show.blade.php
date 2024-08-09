@extends('layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Usuario: {{ $usuario->name }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Principal</a></li>
                    <li class="breadcrumb-item active">Información Usuario</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="col-md-3"></div>
    <div class="col-md-5">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Información del Usuario</h3>
            </div>
            
            <div class="card-body">

                <!-- Usuario -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Usuario</label>
                            <input type="text" class="form-control" value="{{ $usuario->name }}" disabled> 
                        </div>
                    </div>
                </div>

                <!-- Correo Electrónico -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Correo Electrónico</label>
                            <input type="text" class="form-control" value="{{ $usuario->email }}" disabled>
                        </div>
                    </div>
                </div>

                <!-- Boton Volver -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ url('admin/usuarios') }}" class="btn btn-info">
                                Volver
                            </a>
                        </div>
                    </div>
                </div>
                
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div>
    <div class="col-md-3"></div>
@endsection