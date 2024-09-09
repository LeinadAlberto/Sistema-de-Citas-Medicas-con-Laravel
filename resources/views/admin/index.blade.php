@extends('layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-8">
                <h3 class="m-0"><b class="text-info">Bienvenido: </b>{{ Auth::user()->email }} / <b class="text-info">Rol: </b>{{ Auth::user()->roles->pluck('name')->first() }}</h3>
            </div>
            <div class="col-sm-4">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="text-info" href="{{ url('/admin') }}">Principal</a></li>
                    <li class="breadcrumb-item active">Principal</li>
                </ol>
            </div>
        </div>

        <hr>
    </div>
@endsection

@section('content')
    
    @can('admin.usuarios.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $total_usuarios }}</h3>
                    <p>Registros de Usuarios</p>
                </div>
                <a href="{{ url('admin/usuarios/create')}}">
                    <div title="Registrar Usuario" class="icon">
                        <i class="fas bi bi-people-fill"></i>
                    </div>
                </a>
                <a href="{{ url('admin/usuarios')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    @endcan

    @can('admin.secretarias.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $total_secretarias }}</h3>
                    <p>Registros de Secretarias</p>
                </div>
                <a href="{{ url('admin/secretarias/create')}}">
                    <div title="Registrar Secretaria" class="icon">
                        <i class="fas bi bi-person-circle"></i>
                    </div>
                </a>
                <a href="{{ url('admin/secretarias')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    @endcan
    
    @can('admin.pacientes.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $total_pacientes }}</h3>
                    <p>Registros de Pacientes</p>
                </div>
                <a href="{{ url('admin/pacientes/create')}}">
                    <div title="Registrar Paciente" class="icon">
                        <i class="fas bi bi-person-wheelchair"></i>
                    </div>
                </a>
                <a href="{{ url('admin/pacientes')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    @endcan
    
    @can('admin.consultorios.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $total_consultorios }}</h3>
                    <p>Registros de Consultorios</p>
                </div>
                <a href="{{ url('admin/consultorios/create')}}">
                    <div title="Registrar Consultorio" class="icon">
                        <i class="fas bi bi-hospital"></i>
                    </div>
                </a>
                <a href="{{ url('admin/consultorios')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    @endcan

    @can('admin.doctores.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $total_doctores }}</h3>
                    <p>Registros de Doctores</p>
                </div>
                <a href="{{ url('admin/doctores/create')}}">
                    <div title="Registrar Doctor" class="icon">
                        <i class="fas bi bi-person-lines-fill"></i>
                    </div>
                </a>
                <a href="{{ url('admin/doctores')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    @endcan
    
    @can('admin.horarios.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $total_horarios }}</h3>
                    <p>Registros de Horarios</p>
                </div>
                <a href="{{ url('admin/horarios/create')}}">
                    <div title="Registrar Horario" class="icon">
                        <i class="fas bi bi-calendar2-week"></i>
                    </div>
                </a>
                <a href="{{ url('admin/horarios')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    @endcan
    
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="row card-header" style="border-bottom: none;">
                <div class="col-md-6 d-flex align-items-center">
                        <h3 class="card-title">Calendario de atención de doctores</h3>
                </div>    
                
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <label class="mr-4">Consultorios</label>
                    <div class="form-group" width="100px">
                        <select id="consultorio_select" name="consultorio_id" class="form-control">
                            <option>Seleccionar Consultorio</option>
                            @foreach($consultorios as $consultorio)
                                <option value="{{ $consultorio->id }}">{{ $consultorio->nombre . " | " . $consultorio->ubicacion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
        
            </div>
        </div>
    </div>
    
    <script>
        $('#consultorio_select').on('change', function() {
    
            var consultorio_id = $('#consultorio_select').val();
    
            /* var url = "{{ route('admin.horarios.cargar_datos_consultorios', ':id') }}"; */
    
            /* url = url.replace(':id', consultorio_id);  */
    
            /* alert(consultorio_id); */
    
            if (consultorio_id) {
    
                $.ajax({
                    url: "{{ url('/consultorios') }}" + "/" + consultorio_id,
                    type: 'GET',
                    success: function(data) {
                        $('#consultorio_info').html(data);
                    },
                    error: function() {
                        alert('Error al obtener los datos del consultorio');
                    }
                });
    
            } else {
                $('#consultorio_info').html(data);
            }
    
        });
    </script>
    
    <div class="col-md-12">
        <div id="consultorio_info" style="background: #83bbb0;">
                
        </div>
    </div>

    <div class="col-md-12">

        <div class="card card-outline card-warning">

            <div class="row card-header" style="border-bottom: none;">

                <div class="col-md-6 d-flex align-items-center">
                        <h3 class="card-title">Calendario de reserva de citas medicas</h3>
                </div>    
                
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <label class="mr-4">Consultorios</label>
                    <div class="form-group" width="100px">
                        <select id="consultorio_select" name="consultorio_id" class="form-control">
                            <option>Seleccionar Consultorio</option>
                            @foreach($consultorios as $consultorio)
                                <option value="{{ $consultorio->id }}">{{ $consultorio->nombre . " | " . $consultorio->ubicacion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div><!-- /.row -->

            <div class="card-body">

                <div id='calendar'></div>

            </div><!-- /.card-body -->

        </div><!-- /.card -->

    </div><!-- /.col-md-12 -->

    <script>

        document.addEventListener('DOMContentLoaded', function() {

            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {

                initialView: 'dayGridMonth',
                locale: 'es'

            });

            calendar.render();

        });

    </script>
        
@endsection

