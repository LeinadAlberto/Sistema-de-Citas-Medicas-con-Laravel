@extends('layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Crear Secretaria</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Principal</a></li>
                    <li class="breadcrumb-item active">Crear Secretaria</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="col-md-1"></div>

    <div class="col-md-10">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Llene los Datos</h3>
            </div>
            
            <div class="card-body">

                <form action="{{ url('/admin/secretarias/create')}}" method="POST">

                    @csrf 

                    <div class="row">
                        <!-- Nombres -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nombres <b class="text-danger">*</b></label>
                                <input name="nombres" type="text" value="{{ old('nombres') }}" class="form-control" required>
                                @error('nombres')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Apellidos -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Apellidos <b class="text-danger">*</b></label>
                                <input name="apellidos" type="text" value="{{ old('apellidos') }}" class="form-control" required>
                                @error('apellidos')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Celular-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Celular <b class="text-danger">*</b></label>
                                <input name="celular" type="text" value="{{ old('celular') }}" class="form-control" required>
                                @error('celular')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div><!-- /.row -->

                    <div class="row">
                        <!-- Carnet de Identidad -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">C.I. <b class="text-danger">*</b></label>
                                <input name="ci" type="text" value="{{ old('ci') }}" class="form-control" required>
                                @error('ci')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Fecha de Nacimiento -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Fecha de Nacimiento <b class="text-danger">*</b></label>
                                <input name="fecha_nacimiento" type="date" value="{{ old('fecha_nacimiento') }}" class="form-control" required>
                                @error('fecha_nacimiento')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Dirección -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Dirección <b class="text-danger">*</b></label>
                                <input name="direccion" type="text" value="{{ old('direccion') }}" class="form-control" required>
                                @error('direccion')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div><!-- /.row -->

                    <div class="row">
                        <!-- Correo Electrónico -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Correo Electrónico <b class="text-danger">*</b></label>
                                <input name="email" type="email" value="{{ old('email') }}" class="form-control" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Contraseña -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Contraseña <b class="text-danger">*</b></label>
                                <input name="password" type="password" value="{{ old('password') }}" class="form-control" required>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Repetir Contraseña -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Repetir Contraseña <b class="text-danger">*</b></label>
                                <input name="password_confirmation" type="password" value="{{ old('password_confirmation') }}" class="form-control" required>
                                @error('password_confirmation')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div><!-- /.row -->

                    <!-- Botones Cancelar | Registrar -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('admin/secretarias') }}" class="btn btn-secondary">
                                    Cancelar
                                </a>
    
                                <button type="submit" class="btn btn-info">
                                    Registrar Secretaria
                                </button>
                            </div>
                        </div>
                    </div><!-- /.row -->

                </form>

            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- /.col -->

    <div class="col-md-1"></div>
    
@endsection