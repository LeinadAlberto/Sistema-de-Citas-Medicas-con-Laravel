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
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $total_usuarios }}</h3>
                <p>Registros de Usuarios</p>
            </div>
            <a href="{{ url('admin/usuarios/create')}}">
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </a>
            <a href="{{ url('admin/usuarios')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
@endsection