@extends('layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Modificar Paciente: {{ $paciente->nombres }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Principal</a></li>
                    <li class="breadcrumb-item active">Editar Paciente</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Llene los Datos</h3>
            </div>
            
            <div class="card-body">

                <form action="{{ url('/admin/pacientes/'.$paciente->id)}}" method="POST">

                    @csrf 
                    
                    @method('PUT') 
                    
                    <div class="row">
                        <!-- Nombres -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nombres <b class="text-danger">*</b></label>
                                <input name="nombres" type="text" value="{{ $paciente->nombres }}" class="form-control" required>
                                @error('nombres')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- Apellidos -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Apellidos <b class="text-danger">*</b></label>
                                <input name="apellidos" type="text" value="{{ $paciente->apellidos }}" class="form-control" required>
                                @error('apellidos')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- Carnet de Identidad -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">C.I. <b class="text-danger">*</b></label>
                                <input name="ci" type="text" value="{{ $paciente->ci }}" class="form-control" required>
                                @error('ci')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- Número de Seguro -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nro. de Seguro</label>
                                <input name="nro_seguro" type="text" value="{{ $paciente->nro_seguro }}" class="form-control">
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
                                <input name="fecha_nacimiento" type="date" value="{{ $paciente->fecha_nacimiento }}" class="form-control" required>
                                @error('fecha_nacimiento ')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- Género -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Género <b class="text-danger">*</b></label>
                                <select name="genero" id="" class="form-control">
                                    @if ($paciente->genero == "Masculino")
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    @else
                                    <option value="Femenino">Femenino</option>
                                    <option value="Masculino">Masculino</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <!-- Celular -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Celular <b class="text-danger">*</b></label>
                                <input name="celular" type="text" value="{{ $paciente->celular }}" class="form-control" required>
                                @error('celular')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- Correo Electrónico -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Correo Electrónico</label>
                                <input name="correo" type="email" value="{{ $paciente->correo }}" class="form-control" placeholder="correo@ejemplo.com">
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
                                <input name="direccion" type="address" value="{{ $paciente->direccion }}" class="form-control" required>
                                @error('direccion')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- Alergias -->
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Alergias</label>
                                <input name="alergias" type="text" value="{{ $paciente->alergias }}" class="form-control">
                            </div>
                        </div>
                        <!-- Grupo Sanguíneo -->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Grupo Sanguíneo <b class="text-danger">*</b></label>
                                <select name="grupo_sanguineo" id="" class="form-control">
                                    <option value="A+" @selected($paciente->grupo_sanguineo == 'A+')>A+</option>
                                    <option value="A-" @selected($paciente->grupo_sanguineo == 'A-')>A-</option>
                                    <option value="B+" @selected($paciente->grupo_sanguineo == 'B+')>B+</option>
                                    <option value="B-" @selected($paciente->grupo_sanguineo == 'B-')>B-</option>
                                    <option value="AB+" @selected($paciente->grupo_sanguineo == 'AB+')>AB+</option>
                                    <option value="AB-" @selected($paciente->grupo_sanguineo == 'AB-')>AB-</option>
                                    <option value="O+" @selected($paciente->grupo_sanguineo == 'O+')>O+</option>
                                    <option value="O-" @selected($paciente->grupo_sanguineo == 'O-')>O-</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        <!-- Contacto de Emergencia -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Contacto de Emergencia <b class="text-danger">*</b></label>
                                <input name="contacto_emergencia" type="text" value="{{ $paciente->contacto_emergencia }}" class="form-control" required>
                                @error('contacto_emergencia')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- Observaciones -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Observaciones</label>
                                <textarea name="observaciones" id="" class="form-control" cols="50" rows="3">{{ $paciente->observaciones }}</textarea>
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
    
                                <button type="submit" class="btn btn-success">
                                    Actualizar Paciente
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div>
@endsection