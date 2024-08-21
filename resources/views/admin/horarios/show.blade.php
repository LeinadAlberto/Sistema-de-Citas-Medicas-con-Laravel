@extends('layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Horario</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Principal</a></li>
                    <li class="breadcrumb-item active">Información Horario</li>
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
                <h3 class="card-title">Información del Horario</h3>
            </div>
            
            <div class="card-body">

                <form action="{{ url('/admin/horarios/create') }}" method="POST">

                    @csrf 

                    <div class="row">
                        
                        <!-- Doctor -->
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Doctor</label>
                                <input type="text" value="{{ $horario->doctor->nombres . " " . $horario->doctor->apellidos . " | " . $horario->doctor->especialidad }}" class="form-control" disabled>
                            </div>
                        </div>

                        <!-- Consultorios -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Consultorio</label>
                                <input type="text" value="{{ $horario->consultorio->nombre . " | " . $horario->consultorio->ubicacion }}" class="form-control" disabled>
                            </div>
                        </div>
                        

                    </div><!-- /.row -->

                    <div class="row">
                        <!-- Día -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Día <b class="text-danger">*</b></label>
                                <input type="text" value="{{ $horario->dia }}" class="form-control" disabled>
                            </div>
                        </div>

                        <!-- Hora Inicio -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Hora Inicio</label>
                                <input type="text" value="{{ $horario->hora_inicio }}" class="form-control" disabled>
                            </div>
                        </div>

                        <!-- Hora Final -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Hora Final</label>
                                <input type="text" value="{{ $horario->hora_fin }}" class="form-control" disabled>
                            </div>
                        </div>

                    </div><!-- /.row -->

                    <!-- Boton Volver  -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('admin/horarios') }}" class="btn btn-info">
                                    Volver
                                </a>
                            </div>
                        </div>
                    </div><!-- /.row -->

                </form>

            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- /.col -->

    <div class="col-md-2"></div>
    
@endsection