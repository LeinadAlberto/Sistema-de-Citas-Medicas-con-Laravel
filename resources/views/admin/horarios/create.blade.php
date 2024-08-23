@extends('layouts.admin')

@section('content-header')

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1 class="m-0">Crear Horario</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Principal</a></li>
                    <li class="breadcrumb-item active">Crear Horario</li>
                </ol>
            </div>
            
        </div><!-- /.row -->

    </div><!-- /.container-fluid -->

@endsection

@section('content')

    <div class="col-md-2"></div>

    <div class="col-md-8">

        <div class="card card-outline card-info">

            <div class="card-header">
                <h3 class="card-title">Llene los Datos</h3>
            </div>
            
            <div class="card-body">

                <form action="{{ url('/admin/horarios/create') }}" method="POST">

                    @csrf 

                    <!-- Doctor | Consultorios | Hora Final -->
                    <div class="row">
                        
                        <!-- Doctor -->
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Doctor <b class="text-danger">*</b></label>
                                <select name="doctor_id" class="form-control">
                                    @foreach($doctores as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->nombres . " " . $doctor->apellidos . " | " . $doctor->especialidad }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Consultorios -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Consultorios <b class="text-danger">*</b></label>
                                <select name="consultorio_id" class="form-control">
                                    @foreach($consultorios as $consultorio)
                                        <option value="{{ $consultorio->id }}">{{ $consultorio->nombre . " | " . $consultorio->ubicacion }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                    </div><!-- /.row -->

                    <!-- Día |  Hora Inicio |  -->
                    <div class="row">

                        <!-- Día -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Día <b class="text-danger">*</b></label>
                                <select name="dia" class="form-control">
                                    <option value="Lunes">Lunes</option>
                                    <option value="Martes">Martes</option>
                                    <option value="Miercoles">Miércoles</option>
                                    <option value="Jueves">Jueves</option>
                                    <option value="Viernes">Viernes</option>
                                    <option value="Sabado">Sábado</option>
                                    <option value="Domingo">Domingo</option>
                                </select>
                            </div>
                        </div>

                        <!-- Hora Inicio -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Hora Inicio <b class="text-danger">*</b></label>
                                <input name="hora_inicio" type="time" value="{{ old('hora_inicio') }}" class="form-control" required>
                                @error('hora_inicio')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Hora Final -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Hora Final <b class="text-danger">*</b></label>
                                <input name="hora_fin" type="time" value="{{ old('hora_fin') }}" class="form-control" required>
                                @error('hora_fin')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
 
                    </div><!-- /.row -->

                    <!-- Botones Cancelar | Registrar -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('admin/doctores') }}" class="btn btn-secondary">
                                    Cancelar
                                </a>
    
                                <button type="submit" class="btn btn-info">
                                    Registrar Horario
                                </button>
                            </div>
                        </div>
                    </div><!-- /.row -->

                </form>

            </div><!-- /.card-body -->

        </div><!-- /.card -->

    </div><!-- /.col-md-8 -->

    <div class="col-md-2"></div>
    
@endsection