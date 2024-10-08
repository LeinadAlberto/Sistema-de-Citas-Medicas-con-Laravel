@extends('layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Usuario: {{ $usuario->name }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Principal</a></li>
                    <li class="breadcrumb-item active">Eliminar Usuario</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="col-md-3"></div>

    <div class="col-md-6">

        <div class="card card-outline card-danger">

            <div class="card-header">
                <h3 class="card-title text-danger">¿Estas seguro de eliminar este registro?</h3>
            </div>
            
            <div class="card-body">

                <form action="{{ url('/admin/usuarios/'.$usuario->id) }}" method="POST">

                    @csrf 
                    
                    @method('DELETE')

                    <!-- Usuario -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Usuario</label>
                                <input name="name" type="text" value="{{ $usuario->name }}" class="form-control" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- Correo Electrónico -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Correo Electrónico</label>
                                <input name="email" type="email" value="{{ $usuario->email }}" class="form-control" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- Botones Cancelar | Eliminar -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary">
                                    Cancelar
                                </a>
    
                                <button type="submit" class="btn btn-danger">
                                    Eliminar Registro
                                </button>
                            </div>
                        </div>
                    </div>

                </form>

            </div><!-- /.card-body -->

        </div><!-- /.card -->
        
    </div><!-- /.col-md-6 -->

    <div class="col-md-3"></div>

@endsection