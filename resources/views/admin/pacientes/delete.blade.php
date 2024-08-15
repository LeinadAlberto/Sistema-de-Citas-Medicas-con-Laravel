@extends('layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Paciente: {{ $paciente->nombres }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Principal</a></li>
                    <li class="breadcrumb-item active">Eliminar Paciente</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="col-md-12">

        <div class="card card-outline card-danger">

            <div class="card-header">
                <h3 class="card-title text-danger">¿Estas seguro de eliminar este registro?</h3>
            </div>
            
            <div class="card-body">

                <form action="{{ url('/admin/pacientes/'.$paciente->id) }}" method="POST">

                    @csrf
                    
                    @method('DELETE')

                    <div class="row">
                        <!-- Nombres -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nombres</label>
                                <input name="nombres" type="text" value="{{ $paciente->nombres }}" class="form-control" disabled>
                            </div>
                        </div>
                        <!-- Apellidos -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <input name="apellidos" type="text" value="{{ $paciente->apellidos }}" class="form-control" disabled>
                            </div>
                        </div>
                        <!-- Carnet de Identidad -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">C.I.</label>
                                <input name="ci" type="text" value="{{ $paciente->ci }}" class="form-control" disabled>
                            </div>
                        </div>
                        <!-- Número de Seguro -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nro. de Seguro</label>
                                <input name="nro_seguro" type="text" value="{{ $paciente->nro_seguro }}" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <!-- Fecha de Nacimiento -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Fecha de Nacimiento</label>
                                <input name="fecha_nacimiento" type="text" value="{{ $paciente->fecha_nacimiento }}" class="form-control" disabled>
                            </div>
                        </div>
                        <!-- Género -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Género</label>
                                <input type="text" class="form-control" value="{{ $paciente->genero }}" disabled>
                            </div>
                        </div>
                        <!-- Celular -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Celular</label>
                                <input name="celular" type="text" value="{{ $paciente->celular }}" class="form-control" disabled>
                            </div>
                        </div>
                        <!-- Correo Electrónico -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Correo Electrónico</label>
                                <input name="correo" type="text" value="{{ $paciente->correo }}" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <!-- Dirección -->
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Dirección</label>
                                <input name="direccion" type="text" value="{{ $paciente->direccion }}" class="form-control" disabled>
                            </div>
                        </div>
                        <!-- Alergias -->
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Alergias</label>
                                <input name="alergias" type="text" value="{{ $paciente->alergias }}" class="form-control" disabled>
                            </div>
                        </div>
                        <!-- Grupo Sanguíneo -->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Grupo Sanguíneo <b class="text-danger">*</b></label>
                                <input type="text" class="form-control" value="{{ $paciente->grupo_sanguineo }}" disabled >
                            </div>
                        </div>
                    </div>
    
                    
                    <div class="row">
                        <!-- Contacto de Emergencia -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Contacto de Emergencia</label>
                                <input name="contacto_emergencia" type="text" value="{{ $paciente->contacto_emergencia }}" class="form-control" disabled>
                            </div>
                        </div>
                        <!-- Observaciones -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Observaciones</label>
                                <textarea name="observaciones" id="" class="form-control" cols="50" rows="3" disabled>{{ $paciente->observaciones }}</textarea>
                            </div>
                        </div>
                    </div>
    
                    <!-- Botones Cancelar | Eliminar -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('admin/pacientes') }}" class="btn btn-secondary">
                                    Cancelar
                                </a>

                                <button type="submit" class="btn btn-danger">
                                    Eliminar Registro
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
  
            </div><!-- /.card-body -->

        </div><!-- /.card -->

    </div><!-- /.col-md-12 -->

@endsection