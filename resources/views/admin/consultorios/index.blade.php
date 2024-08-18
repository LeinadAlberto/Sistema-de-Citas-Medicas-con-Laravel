@extends('layouts.admin')

@section('content-header')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Listado de Consultorios</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Principal</a></li>
                    <li class="breadcrumb-item active">Consultorios</li>
                </ol>
            </div>
        </div>
    </div>

@endsection

@section('content')

    <div class="col-md-12">

        <div class="card card-outline card-info">

            <div class="card-header">
                <h3 class="card-title">Consultorios Registrados</h3>
                <div class="card-tools">
                    <a href="{{ url('admin/consultorios/create') }}" class="btn btn-info">
                        Nuevo Consultorio
                    </a>
                </div>
            </div><!-- /.card-header-->

            <div class="card-body">

                <table id="example1" class="table table-striped table-bordered table-hover ">

                    <thead class="thead-dark text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Consultorio</th>
                            <th scope="col">Ubicación</th>
                            <th scope="col">Capacidad</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Especialidad</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>

                    <tbody class="text-center">
                        <?php $contador = 1; ?>
                        @foreach($consultorios as $consultorio)
                            <tr>
                                <th scope="row">{{ $contador++ }}</th>
                                <td>{{ $consultorio->nombre }}</td>
                                <td>{{ $consultorio->ubicacion }}</td>
                                <td>{{ $consultorio->capacidad }}</td>
                                @if ( $consultorio->telefono == null )
                                    <td>Sin Teléfono fijo</td>
                                @else
                                    <td>{{ $consultorio->telefono }}</td>
                                @endif
                                
                                <td>{{ $consultorio->especialidad }}</td>
                                <td>{{ $consultorio->estado }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Exemplo Basico">
                                        <a href="{{ url('admin/consultorios/'.$consultorio->id) }}" title="Ver" type="button" class="btn btn-info btn-sm">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <a href="{{ url('admin/consultorios/'.$consultorio->id.'/edit') }}" title="Editar" type="button" class="btn btn-success btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <a href="{{ url('admin/consultorios/'.$consultorio->id.'/confirm-delete') }}" title="Eliminar" type="button" class="btn btn-danger btn-sm">
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