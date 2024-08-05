@extends('layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Modificar Usuario: {{ $usuario->name }}</h1>
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
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Llene los Datos</h3>
            </div>
            
            <div class="card-body">

                <form action="{{ url('/admin/usuarios/'.$usuario->id) }}" method="POST">

                    @csrf <!-- Genera un token de protección contra ataques CSRF (Cross-Site Request Forgery). -->
                    
                    @method('PUT')

                    <!-- Usuario -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Usuario <b class="text-danger">*</b></label>
                                <input name="name" type="text" value="{{ $usuario->name }}" class="form-control" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Correo Electrónico -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Correo Electrónico <b class="text-danger">*</b></label>
                                <input name="email" type="email" value="{{ $usuario->email }}" class="form-control" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Contraseña -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Contraseña</label>
                                <input name="password" type="password" value="{{ old('password') }}" class="form-control">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Repetir Contraseña -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Repetir Contraseña</label>
                                <input name="password_confirmation" type="password" value="{{ old('password_confirmation') }}" class="form-control">
                                @error('password_confirmation')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
    
                                <button type="submit" class="btn btn-success">
                                    Actualizar Usuario
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div>
@endsection