<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Horario;
use App\Models\Paciente;
use App\Models\Secretaria;
use App\Models\Consultorio;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $total_usuarios = User::count();
        $total_doctores = Doctor::count();
        $total_horarios = Horario::count();
        $total_pacientes = Paciente::count();
        $total_secretarias = Secretaria::count();
        $total_consultorios = Consultorio::count();

        $doctores = Doctor::all();
        $consultorios = Consultorio::all();

        return view('admin.index', 
                    compact('total_usuarios', 
                            'total_secretarias', 
                            'total_pacientes', 
                            'total_consultorios', 
                            'total_doctores',
                            'total_horarios',
                            'consultorios',
                            'doctores')
                    );

    }
}
