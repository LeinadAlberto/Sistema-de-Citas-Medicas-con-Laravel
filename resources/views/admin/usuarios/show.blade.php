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
                    <li class="breadcrumb-item active">Crear Usuario</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-md-6">
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
                            <p>{{ $usuario->name }}</p> 
                        </div>
                    </div>
                </div>

                <!-- Correo Electrónico -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Correo Electrónico</label>
                            <p>{{ $usuario->email }}</p>
                           
                        </div>
                    </div>
                </div>

                <!-- Botones Cancelar | Registrar -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary">
                                Cancelar
                            </a>
                        </div>
                    </div>
                </div>
                
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div>
@endsection