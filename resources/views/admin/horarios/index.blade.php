@extends('layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Listado de Horarios</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Principal</a></li>
                    <li class="breadcrumb-item active">Horarios</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')

<div class="col-md-12">

    <div class="card card-outline card-info">

        <div class="card-header">
            <h3 class="card-title">Horarios Registrados</h3>
            <div class="card-tools">
                <a href="{{ url('admin/horarios/create') }}" class="btn btn-info">
                    Nuevo Horario
                </a>
            </div>
        </div><!-- /.card-header-->

        <div class="card-body">

            <table id="example1" class="table table-striped table-bordered table-hover ">

                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Especialidad</th>
                        <th scope="col">Consultorio</th>
                        <th scope="col">Día de atención</th>
                        <th scope="col">Hora Inicio</th>
                        <th scope="col">Hora Fin</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody class="text-center">
                    <?php $contador = 1; ?>
                    @foreach($horarios as $horario)
                        <tr>
                            <th scope="row">{{ $contador++ }}</th>
                            <td>{{ $horario->doctor->nombres . " " . $horario->doctor->apellidos }}</td>
                            <td>{{ $horario->doctor->especialidad }}</td>
                            <td>{{ $horario->consultorio->nombre . " | " . $horario->consultorio->ubicacion }}</td>
                            <td>{{ $horario->dia }}</td>
                            <td>{{ $horario->hora_inicio }}</td>
                            <td>{{ $horario->hora_fin }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Exemplo Basico">
                                    <a href="{{ url('admin/horarios/'.$horario->id) }}" title="Ver" type="button" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a href="{{ url('admin/horarios/'.$horario->id.'/edit') }}" title="Editar" type="button" class="btn btn-success btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <a href="{{ url('admin/horarios/'.$horario->id.'/confirm-delete') }}" title="Eliminar" type="button" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                <script>
                    $(function () {

                        $("#example1").DataTable({

                            "pageLength": 10,

                            "language": {
                                "emptyTable": "No hay información",
                                "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
                                "infoEmpty": "Mostrando 0 a 0 de 0 Registros",
                                "infoFiltered": "(Filtrado de _MAX_ total Registros)",
                                "infoPostFix": "",
                                "thousands": ",",
                                "lengthMenu": "Mostrar _MENU_ Registros",
                                "loadingRecords": "Cargando...",
                                "processing": "Procesando...",
                                "search": "Buscador:",
                                "zeroRecords": "Sin resultados encontrados",
                                "paginate": {
                                    "first": "Primero",
                                    "last": "Ultimo",
                                    "next": "Siguiente",
                                    "previous": "Anterior"
                                }
                            },

                            "responsive": true, "lengthChange": true, "autoWidth": false,

                            buttons: [
                                {
                                    extend: 'collection',
                                    text: 'Reportes',
                                    orientation: 'landscape',

                                    buttons: [
                                        {text: 'Copiar', extend: 'copy'}, 
                                        {extend: 'pdf'},
                                        {extend: 'csv'},
                                        {extend: 'excel'},
                                        {text: 'Imprimir', extend: 'print'}
                                    ]

                                },

                                {
                                    extend: 'colvis',
                                    text: 'Visor de columnas',
                                    collectionLayout: 'fixed three-column'
                                }
                            ],

                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

                    });

                </script>
                    

            </table>

        </div><!-- /.card-body-->

    </div><!-- /.card-->
    
</div><!-- /.col-md-10-->

<div class="col-md-12">

    <div class="card card-outline card-info">

        <div class="card-header">
            <h3 class="card-title">Calendario de Atención de Doctores</h3>
        </div><!-- /.card-header-->

        <div class="card-body">

            <table style="font-size: 13px;" class="table table-striped table-bordered table-hover table-sm">

                <thead class="thead-dark text-center">
                    <tr>
                        <th width="12%">Hora</th>
                        <th width="15%">Lunes</th>
                        <th width="15%">Martes</th>
                        <th width="15%">Miércoles</th>
                        <th width="15%">Jueves</th>
                        <th width="14%">Viernes</th>
                        <th width="14%">Sábado</th>
                        
                    </tr>
                </thead>

                <tbody class="text-center">
                    {{-- <tr>
                        <td height="50px" style="vertical-align: middle; font-weight: bold;">08:00 - 09:00</td>
                        <td></td>
                        <td>Carla Vanesa Ticona Lopez</td>
                        <td></td>
                        <td></td>
                        <td>Carla Vanesa Ticona Lopez</td>
                        <td></td>
                    </tr> --}}
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

                        $diasSemana = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"];
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

        </div><!-- /.card-body-->

    </div><!-- /.card-->
    
</div><!-- /.col-md-10-->

@endsection