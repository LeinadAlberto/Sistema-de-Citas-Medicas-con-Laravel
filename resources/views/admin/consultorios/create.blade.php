@extends('layouts.admin')

@section('content-header')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Crear Consultorio</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Principal</a></li>
                    <li class="breadcrumb-item active">Crear Consultorio</li>
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
                <h3 class="card-title">Llene los Datos</h3>
            </div>
            
            <div class="card-body">

                <form action="{{ url('/admin/consultorios/create')}}" method="POST">

                    @csrf 
                    
                    <div class="row">
                        <!-- Nombre -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nombre del Consultorio <b class="text-danger">*</b></label>
                                <input name="nombre" type="text" value="{{ old('nombre') }}" class="form-control" required>
                                @error('nombre')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- Ubicación -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Ubicación <b class="text-danger">*</b></label>
                                <input name="ubicacion" type="text" value="{{ old('ubicacion') }}" class="form-control" required>
                                @error('ubicacion')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- Capacidad -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Capacidad <b class="text-danger">*</b></label>
                                <input name="capacidad" type="text" value="{{ old('capacidad') }}" class="form-control" required>
                                @error('capacidad')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Teléfono -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Teléfono</label>
                                <input name="telefono" type="number" value="{{ old('telefono') }}" class="form-control">
                            </div>
                        </div>
                        <!-- Especialidad -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Especialidad <b class="text-danger">*</b></label>
                                <input name="especialidad" type="text" value="{{ old('especialidad') }}" class="form-control" required>
                                @error('especialidad ')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- Estado -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Estado <b class="text-danger">*</b></label>
                                <select name="estado" id="" class="form-control">
                                    <option value="" selected>Elija una opción</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Botones Cancelar | Registrar -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('admin/consultorios') }}" class="btn btn-secondary">
                                    Cancelar
                                </a>
    
                                <button type="submit" class="btn btn-info">
                                    Registrar Consultorio
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div>

    <div class="col-md-2"></div>

@endsection