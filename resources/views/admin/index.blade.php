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

                <div class="row">

                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                        Registrar cita médica
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Reserva de cita médica</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                                <form action="{{ url('/admin/eventos/create') }}" method="post">

                                    @csrf

                                    <div class="modal-body">
    
                                        <div class="row">
                                            <!-- Doctor -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Doctor</label>
                                                    <select name="doctor_id" id="" class="form-control">
                                                        <option value="select" selected disabled>Seleccione una doctor...</option>
                                                        @foreach ($doctores as $doctore)
                                                            <option value="{{ $doctore->id }}">
                                                                {{ $doctore->nombres . " " . $doctore->apellidos . " - " . $doctore->especialidad }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div><!-- /.col-md-12 -->
                                            
                                            <!-- Fecha de reserva-->
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="">Fecha de reserva</label>
                                                    <input name="fecha_reserva" id="fecha_reserva" value="<?php echo date('Y-m-d'); ?>" type="date" class="form-control">
                                                    <!-- Script que valida que no se pueda seleccionar una fecha pasada -->
                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function() {

                                                            const fechaReservaInput = document.getElementById('fecha_reserva');

                                                            // Escuchar el evento de cambio en el campo de fecha de reserva
                                                            fechaReservaInput.addEventListener('change', function() {

                                                                let selectedDate = this.value; // Obtener la fecha seleccionada

                                                                // Obtener la fecha actual en formato ISO (yy-mm-dd)
                                                                let today = new Date().toISOString().slice(0, 10);

                                                                // Verificar si la fecha seleccionada es anterior a la fecha actual
                                                                if (selectedDate < today) {
                                                                    // Si es asi, establecer la fecha seleccionada en null
                                                                    this.value = null;
                                                                    alert('No se puede reservar una cita en una fecha pasada.');
                                                                }
                                                            });

                                                        });
                                                    </script>
                                                    
                                                </div>
                                            </div><!-- /.col-md-12 -->
    
                                            <!-- Hora de reserva-->
                                            <div class="col-md-7">
                                                <label for="">Hora de reserva</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="fas fa-clock"></i> <!-- Ícono de reloj -->
                                                        </span>
                                                    </div>

                                                    {{-- <input name="hora_reserva" id="hora_reserva" type="time" class="form-control"> --}}
                                                    <select name="hora_reserva" id="" type="time" class="form-control">
                                                        <option value="select" selected disabled>Seleccione una hora...</option>
                                                        <option value="08:00">08:00</option>
                                                        <option value="09:00">09:00</option>
                                                        <option value="10:00">10:00</option>
                                                        <option value="11:00">11:00</option>
                                                        <option value="12:00">12:00</option>
                                                        <option value="13:00">13:00</option>
                                                        <option value="14:00">14:00</option>
                                                        <option value="15:00">15:00</option>
                                                        <option value="16:00">16:00</option>
                                                        <option value="17:00">17:00</option>
                                                        <option value="18:00">18:00</option>
                                                        <option value="19:00">19:00</option>
                                                        <option value="20:00">20:00</option>
                                                    </select>
                                                </div>
                                            </div><!-- /.col-md-12 -->
                                        </div><!-- /.row -->
    
                                    </div><!-- /.modal-body -->
    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-info">Registrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.modal -->
                    
                </div>

                <div id='calendar'></div>

            </div><!-- /.card-body -->

        </div><!-- /.card -->

    </div><!-- /.col-md-12 -->

    <script>

        document.addEventListener('DOMContentLoaded', function() {

            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {

                initialView: 'dayGridMonth',
                locale: 'es',
                events: [
                    {
                        title: 'Cons. Odontología',
                        start: '2024-09-09',
                        end: '2024-09-09',
                        color: '#FF4848'
                    }
                ],
                /* Permite agregar un salto de linea entre dos cadenas de texto. */
                /* eventContent: function(arg) {
                    if (arg.event.title === 'Consultorio Odontología') {
                        return { html: '<center><b>Consultorio</b><br><b>Odontología</b><center>' };
                    }
                } */

            });

            calendar.render();

        });

    </script>
        
@endsection

