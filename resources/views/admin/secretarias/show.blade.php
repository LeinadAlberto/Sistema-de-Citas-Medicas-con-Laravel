@extends('layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Secretaria: {{ $secretaria->nombres }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Principal</a></li>
                    <li class="breadcrumb-item active">Información Secretaria</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="col-md-1"></div>

    <div class="col-md-10">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Información de la Secretaria</h3>
            </div>
            
            <div class="card-body">

                <div class="row">
                    <!-- Nombres -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Nombres</label>
                            <input type="text" class="form-control" value="{{ $secretaria->nombres }}" disabled>
                        </div>
                    </div>

                    <!-- Apellidos -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Apellidos</label>
                            <input type="text" class="form-control" value="{{ $secretaria->apellidos }}" disabled>
                        </div>
                    </div>

                    <!-- Celular-->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Celular</label>
                            <input type="text" class="form-control" value="{{ $secretaria->celular }}" disabled>
                        </div>
                    </div>
                </div><!-- /.row -->

                <div class="row">
                    <!-- Carnet de Identidad -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">C.I.</label>
                            <input type="text" class="form-control" value="{{ $secretaria->ci}}" disabled> <p></p>
                        </div>
                    </div>

                    <!-- Fecha de Nacimiento -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Fecha de Nacimiento</label>
                            <input type="text" class="form-control" value="{{ $secretaria->fecha_nacimiento }}" disabled>
                        </div>
                    </div>

                    <!-- Dirección -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Dirección</label>
                            <input type="text" class="form-control" value="{{ $secretaria->direccion }}" disabled><p></p>
                        </div>
                    </div>
                </div><!-- /.row -->

                <div class="row">
                    <!-- Correo Electrónico -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Correo Electrónico</label>
                            <input type="text" class="form-control" value="{{ $secretaria->user->email }}" disabled>
                        </div>
                    </div>
                </div><!-- /.row -->

                <!-- Boton Volver  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ url('admin/secretarias') }}" class="btn btn-info">
                                Volver
                            </a>
                        </div>
                    </div>
                </div><!-- /.row -->

            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- /.col -->

    <div class="col-md-1"></div>
    
@endsection