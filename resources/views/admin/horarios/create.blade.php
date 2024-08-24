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

    <div class="col-md-12">

        <div class="card card-outline card-info">

            <div class="card-header">
                <h3 class="card-title">Llene los Datos</h3>
            </div>
            
            <div class="card-body row">

                <div class="col-md-3" >

                    <form action="{{ url('/admin/horarios/create') }}" method="POST">

                        @csrf 
    
                        <!-- Doctor | Consultorios | Hora Final -->
                        <div class="row">
                            
                            <!-- Doctor -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Doctor <b class="text-danger">*</b></label>
                                    <select style="font-size: 13px" name="doctor_id" class="form-control">
                                        @foreach($doctores as $doctor)
                                            <option value="{{ $doctor->id }}">{{ $doctor->nombres . " " . $doctor->apellidos . " | " . $doctor->especialidad }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
    
                            <!-- Consultorios -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Consultorios <b class="text-danger">*</b></label>
                                    <select style="font-size: 13px" name="consultorio_id" class="form-control">
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Día <b class="text-danger">*</b></label>
                                    <select style="font-size: 13px" name="dia" class="form-control">
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Hora Inicio <b class="text-danger">*</b></label>
                                    <input style="font-size: 13px" name="hora_inicio" type="time" value="{{ old('hora_inicio') }}" class="form-control" required>
                                    @error('hora_inicio')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
    
                            <!-- Hora Final -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Hora Final <b class="text-danger">*</b></label>
                                    <input style="font-size: 13px" name="hora_fin" type="time" value="{{ old('hora_fin') }}" class="form-control" required>
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

                </div>

                <div class="col-md-9">

                    <table style="font-size: 12px;" class="table table-striped table-bordered table-hover table-sm">
    
                        <thead class="thead-dark text-center">
                            <tr>
                                <th width="16%">Hora</th>
                                <th width="12%">Lunes</th>
                                <th width="12%">Martes</th>
                                <th width="12%">Miércoles</th>
                                <th width="12%">Jueves</th>
                                <th width="12%">Viernes</th>
                                <th width="12%">Sábado</th>
                                <th width="12%">Domingo</th>
                                
                            </tr>
                        </thead>
            
                        <tbody class="text-center">
                            
                            @php
                                $horas = [ "08:00:00 - 09:00:00", 
                                            "09:00:00 - 10:00:00", 
                                            "10:00:00 - 11:00:00", 
                                            "11:00:00 - 12:00:00", 
                                            "12:00:00 - 13:00:00", 
                                            "13:00:00 - 14:00:00", 
                                            "14:00:00 - 15:00:00", 
                                            "15:00:00 - 16:00:00", 
                                            "16:00:00 - 17:00:00", 
                                            "17:00:00 - 18:00:00", 
                                            "18:00:00 - 19:00:00", 
                                            "19:00:00 - 20:00:00" ];
            
                                $diasSemana = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];
                            @endphp
            
                            @foreach ($horas as $hora)
            
                                @php
                                    list($hora_inicio, $hora_fin) = explode(" - ", $hora);
                                @endphp
                                
                                <tr>
                                    <td height="50px" style="vertical-align: middle; font-weight: bold;">
                                        {{ $hora }}
                                    </td>
            
                                    @foreach ($diasSemana as $dia)
                                        @php
                                            $nombre_doctor = "";
                                            foreach ($horarios as $horario) {
            
                                                if ($horario->dia == $dia && 
                                                    $hora_inicio >= $horario->hora_inicio && 
                                                    $hora_fin <= $horario->hora_fin) {
            
                                                    $nombre_doctor = $horario->doctor->nombres." ".$horario->doctor->apellidos;
                                                    break; 
                                                         
                                                }
                                   
                                            }
                                        @endphp
                                        <td>{{ $nombre_doctor }}</td>
                                    @endforeach
                                </tr>
            
                            @endforeach
                        </tbody>
            
                    </table>

                </div>

                

            </div><!-- /.card-body -->

        </div><!-- /.card -->

    </div><!-- /.col-md-4 -->

    <div class="col-md-8">

        

    </div><!-- /.col-md-8 -->

    
    
@endsection