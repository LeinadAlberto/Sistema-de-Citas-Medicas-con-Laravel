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

            <div class="row">
                <div class="col-3">

                    <div class="form-group" width="100px">
                        <label for="">Consultorios</label>
                        <select id="consultorio_select" name="consultorio_id" class="form-control">
                            @foreach($consultorios as $consultorio)
                                <option value="{{ $consultorio->id }}">{{ $consultorio->nombre . " | " . $consultorio->ubicacion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <script>
                $('#consultorio_select').on('change', function() {

                    var consultorio_id = $('#consultorio_select').val();

                    var url = "{{ route('admin.horarios.cargar_datos_consultorios', ':id') }}";

                    url = url.replace(':id', consultorio_id); 

                    /* alert(consultorio_id); */

                    if (consultorio_id) {

                        $.ajax({
                            /* url: "{{ url('/admin/horarios/consultorios/') }}" + "/" + consultorio_id, */
                            url: url,
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

            <div id="consultorio_info">

            </div>

            

        </div><!-- /.card-body-->

    </div><!-- /.card-->
    
</div><!-- /.col-md-10-->

@endsection