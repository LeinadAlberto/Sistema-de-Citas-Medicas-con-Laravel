@extends('layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Panel Principal</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Principal</a></li>
                    <li class="breadcrumb-item active">Principal</li>
                </ol>
            </div>
        </div>

        <hr>
    </div>
@endsection

@section('content')
    
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
    
@endsection