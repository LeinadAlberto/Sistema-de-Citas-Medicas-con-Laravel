@extends('layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Listado de Pacientes</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Principal</a></li>
                    <li class="breadcrumb-item active">Pacientes</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="col-md-12">

    <div class="card card-outline card-info">

        <div class="card-header">
            <h3 class="card-title">Pacientes Registrados</h3>
            <div class="card-tools">
                <a href="{{ url('admin/pacientes/create') }}" class="btn btn-info">
                    Nuevo Paciente
                </a>
            </div>
        </div><!-- /.card-header-->

        <div class="card-body">

            <table id="example1" class="table table-striped table-bordered table-hover ">

                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombres y Apellidos</th>
                        <th scope="col">C.I.</th>
                        <th scope="col">Genero</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Correo Electrónico</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody class="text-center">
                    <?php $contador = 1; ?>
                    @foreach($pacientes as $paciente)
                        <tr>
                            <th scope="row">{{ $contador++ }}</th>
                            <td>{{ $paciente->nombres }} {{ $paciente->apellidos}}</td>
                            <td>{{ $paciente->ci }}</td>
                            <td>{{ $paciente->genero }}</td>
                            <td>{{ $paciente->celular }}</td>
                            <td>{{ $paciente->correo }}</td>
                            <td>{{ $paciente->direccion }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Exemplo Basico">
                                    <a href="{{ url('admin/pacientes/'.$paciente->id) }}" title="Ver" type="button" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a href="{{ url('admin/pacientes/'.$paciente->id.'/edit') }}" title="Editar" type="button" class="btn btn-success btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <a href="{{ url('admin/pacientes/'.$paciente->id.'/confirm-delete') }}" title="Eliminar" type="button" class="btn btn-danger btn-sm">
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
@endsection