@extends('layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Doctor: {{ $doctor->nombres }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Principal</a></li>
                    <li class="breadcrumb-item active">Información Doctor</li>
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
                <h3 class="card-title">Información del Doctor</h3>
            </div>
            
            <div class="card-body">
                   
                <div class="row">
                    <!-- Nombres -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Nombres</label>
                            <input name="nombres" type="text" value="{{ $doctor->nombres }}" class="form-control" disabled>
                            
                        </div>
                    </div>

                    <!-- Apellidos -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Apellidos</label>
                            <input name="apellidos" type="text" value="{{ $doctor->apellidos }}" class="form-control" disabled>
                        </div>
                    </div>

                    <!-- Teléfono-->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Teléfono</label>
                            <input name="telefono" type="number" value="{{ $doctor->telefono }}" class="form-control" disabled>
                        </div>
                    </div>

                    <!-- Licencia Médica -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Licencia Médica</label>
                            <input name="licencia_medica" type="text" value="{{ $doctor->licencia_medica }}" class="form-control" disabled>
                        </div>
                    </div>
                </div><!-- /.row -->

                <div class="row">
                    <!-- Especialidad -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Especialidad</label>
                            <input name="especialidad" type="text" value="{{ $doctor->especialidad }}" class="form-control" disabled>
                        </div>
                    </div>

                    <!-- Correo Electrónico -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Correo Electrónico</label>
                            <input name="email" type="email" value="{{ $doctor->user->email }}" class="form-control" disabled>
                        </div>
                    </div>
                </div><!-- /.row -->

                <!-- Boton Volver -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ url('admin/doctores') }}" class="btn btn-info">
                                Volver
                            </a>
                        </div>
                    </div>
                </div><!-- /.row -->

            </div><!-- /.card-body -->

        </div><!-- /.card -->

    </div><!-- /.col-md-10 -->

    <div class="col-md-1"></div>
    
@endsection