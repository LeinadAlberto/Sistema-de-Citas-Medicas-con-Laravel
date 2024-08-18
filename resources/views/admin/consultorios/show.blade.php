@extends('layouts.admin')

@section('content-header')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Consultorio: {{ $consultorio->nombre }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Principal</a></li>
                    <li class="breadcrumb-item active">Información Consultorio</li>
                </ol>
            </div>
        </div>
    </div>
    
@endsection

@section('content')

    <div class="col-md-2"></div>

    <div class="col-md-8">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Información del Consultorio</h3>
            </div>
            
            <div class="card-body">

                <div class="row">
                    <!-- Nombre -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Nombre del Consultorio</label>
                            <input name="nombre" type="text" value="{{ $consultorio->nombre }}" class="form-control" disabled>
                        </div>
                    </div>
                    <!-- Ubicación -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Ubicación</label>
                            <input name="ubicacion" type="text" value="{{ $consultorio->ubicacion }}" class="form-control" disabled>
                        </div>
                    </div>
                    <!-- Capacidad -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Capacidad</label>
                            <input name="capacidad" type="text" value="{{ $consultorio->capacidad }}" class="form-control" disabled>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Teléfono -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Teléfono</label>
                            <input name="telefono" type="number" value="{{ $consultorio->telefono }}" class="form-control" disabled>
                        </div>
                    </div>
                    <!-- Especialidad -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Especialidad</label>
                            <input name="especialidad" type="text" value="{{ $consultorio->especialidad }}" class="form-control" disabled>
                        </div>
                    </div>
                    <!-- Estado -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Estado</label>
                            <input type="text" value="{{ $consultorio->estado }}" class="form-control" disabled>
                        </div>
                    </div>
                </div>

                <!-- Botones Volver -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ url('admin/consultorios') }}" class="btn btn-info">
                                Volver
                            </a>
                        </div>
                    </div>
                </div>
              
            </div><!-- /.card-body -->

        </div><!-- /.card -->

    </div><!-- /.col-md-8 -->

    <div class="col-md-2"></div>

@endsection