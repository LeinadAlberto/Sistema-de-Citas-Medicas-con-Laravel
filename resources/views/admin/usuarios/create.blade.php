@extends('layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Crear Usuario</h1>
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
                <h3 class="card-title">Llene los Datos</h3>
            </div>

            <div class="card-body">
                <form action="{{ url('/admin/usuarios/create')}}" method="POST">
                    @csrf {{-- Genera un token de protección contra ataques CSRF (Cross-Site Request Forgery). --}}
                    {{-- Usuario --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Usuario <b class="text-danger">*</b></label>
                                <input name="name" type="text" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    {{-- Correo Electrónico --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Correo Electrónico <b class="text-danger">*</b></label>
                                <input name="email" type="email" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    {{-- Contraseña --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Contraseña <b class="text-danger">*</b></label>
                                <input name="password" type="password" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    {{-- Repetir Contraseña --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Repetir Contraseña <b class="text-danger">*</b></label>
                                <input name="password_confirmation" type="password" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    {{-- Botones Cancelar | Registrar --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary">
                                    Cancelar
                                </a>
    
                                <button type="submit" class="btn btn-info">
                                    Registrar Usuario
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>{{-- /.card-body --}}
        </div>{{-- /.card --}}
    </div>
@endsection