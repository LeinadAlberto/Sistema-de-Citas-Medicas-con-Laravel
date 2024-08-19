@extends('layouts.admin')

@section('content-header')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Modificar Secretaria: {{ $secretaria->nombres }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Principal</a></li>
                    <li class="breadcrumb-item active">Editar Secretaria</li>
                </ol>
            </div>
        </div>
    </div>

@endsection

@section('content')

    <div class="col-md-1"></div>

    <div class="col-md-10">

        <div class="card card-outline card-success">

            <div class="card-header">
                <h3 class="card-title">Llene los Datos</h3>
            </div>
            
            <div class="card-body">

                <form action="{{ url('/admin/secretarias/'.$secretaria->id) }}" method="POST">

                    @csrf 

                    @method('PUT')

                    <div class="row">
                        <!-- Nombres -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nombres <b class="text-danger">*</b></label>
                                <input name="nombres" type="text" value="{{ $secretaria->nombres }}" class="form-control" required>
                                @error('nombres')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Apellidos -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Apellidos <b class="text-danger">*</b></label>
                                <input name="apellidos" type="text" value="{{ $secretaria->apellidos }}" class="form-control" required>
                                @error('apellidos')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Celular-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Celular <b class="text-danger">*</b></label>
                                <input name="celular" type="text" value="{{ $secretaria->celular }}" class="form-control" required>
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
                                <input name="ci" type="text" value="{{ $secretaria->ci }}" class="form-control" required>
                                @error('ci')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Fecha de Nacimiento -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Fecha de Nacimiento <b class="text-danger">*</b></label>
                                <input name="fecha_nacimiento" type="date" value="{{ $secretaria->fecha_nacimiento }}" class="form-control" required>
                                @error('fecha_nacimiento')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Dirección -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Dirección <b class="text-danger">*</b></label>
                                <input name="direccion" type="text" value="{{ $secretaria->direccion }}" class="form-control" required>
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
                                <input name="email" type="email" value="{{ $secretaria->user->email }}" class="form-control" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Contraseña -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Contraseña</label>
                                <input name="password" type="password" value="{{ old('password') }}" class="form-control" >
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Repetir Contraseña -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Repetir Contraseña</label>
                                <input name="password_confirmation" type="password" value="{{ old('password_confirmation') }}" class="form-control">
                                @error('password_confirmation')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div><!-- /.row -->

                    <!-- Botones Cancelar | Editar -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('admin/secretarias') }}" class="btn btn-secondary">
                                    Cancelar
                                </a>
    
                                <button type="submit" class="btn btn-success">
                                    Actualizar Secretaria
                                </button>
                            </div>
                        </div>
                    </div><!-- /.row -->

                </form>

            </div><!-- /.card-body -->

        </div><!-- /.card -->

    </div><!-- /.col-md-10 -->

    <div class="col-md-1"></div>
    
@endsection