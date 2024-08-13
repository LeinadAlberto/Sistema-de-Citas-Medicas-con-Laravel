@extends('layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Crear Paciente</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Principal</a></li>
                    <li class="breadcrumb-item active">Crear Paciente</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Llene los Datos</h3>
            </div>
            
            <div class="card-body">

                <form action="{{ url('/admin/pacientes/create')}}" method="POST">

                    @csrf 
                    
                    <div class="row">
                        <!-- Nombres -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nombres <b class="text-danger">*</b></label>
                                <input name="nombres" type="text" value="{{ old('nombres') }}" class="form-control" required>
                                @error('nombres')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- Apellidos -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Apellidos <b class="text-danger">*</b></label>
                                <input name="apellidos" type="text" value="{{ old('apellidos') }}" class="form-control" required>
                                @error('apellidos')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
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
                        <!-- Número de Seguro -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nro. de Seguro</label>
                                <input name="nro_seguro" type="text" value="{{ old('nro_seguro') }}" class="form-control">
                                @error('nro_seguro')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Fecha de Nacimiento -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Fecha de Nacimiento <b class="text-danger">*</b></label>
                                <input name="fecha_nacimiento " type="date" value="{{ old('fecha_nacimiento ') }}" class="form-control" required>
                                @error('fecha_nacimiento ')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- Género -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Género</label>
                                <select name="genero" id="" class="form-control">
                                    <option value="" selected>Elija una opción</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                        </div>
                        <!-- Celular -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Celular <b class="text-danger">*</b></label>
                                <input name="celular" type="number" value="{{ old('celular') }}" class="form-control" required>
                                @error('celular')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- Correo Electrónico -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Correo Electrónico</label>
                                <input name="correo" type="email" value="{{ old('correo') }}" class="form-control" placeholder="correo@ejemplo.com">
                                @error('correo')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Dirección -->
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Dirección <b class="text-danger">*</b></label>
                                <input name="direccion" type="address" value="{{ old('direccion') }}" class="form-control" required>
                                @error('direccion')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- Alergias -->
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Alergias</label>
                                <input name="alergias" type="text" value="{{ old('alergias') }}" class="form-control">
                                @error('alergias')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- Grupo Sanguíneo -->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Grupo Sanguíneo</label>
                                <select name="grupo_sanguineo " id="" class="form-control">
                                    <option value="" selected>Elija una opción</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        <!-- Contacto de Emergencia -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Contacto de Emergencia <b class="text-danger">*</b></label>
                                <input name="contacto_emergencia" type="number" value="{{ old('contacto_emergencia') }}" class="form-control" required>
                                @error('contacto_emergencia')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- Observaciones -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Observaciones</label>
                                <textarea name="observaciones" id="" class="form-control" cols="50" rows="3" value="{{ old('observaciones') }}">
                                </textarea>
                                @error('observaciones')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Botones Cancelar | Registrar -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('admin/pacientes') }}" class="btn btn-secondary">
                                    Cancelar
                                </a>
    
                                <button type="submit" class="btn btn-info">
                                    Registrar Paciente
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div>
@endsection