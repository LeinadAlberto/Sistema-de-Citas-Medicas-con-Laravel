<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Consultorio;
use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index() {
    
        $horarios = Horario::with('doctor', 'consultorio')->get();

        return view('admin.horarios.index', compact('horarios'));

    }

    public function create() {

        $doctores = Doctor::all();

        $consultorios = Consultorio::all();
    
        return view('admin.horarios.create', compact('doctores', 'consultorios'));

    }

    public function store(Request $request) {
    
        $request->validate([

            'dia'=>'required',
            'hora_inicio'=>'required',
            'hora_fin'=>'required'
            
        ]);

        Horario::create($request->all());

        return redirect()->route('admin.horarios.index')
        ->with('mensaje', 'Horario registrado exitosamente.')
        ->with('icono', 'success');

    }

    public function show(Horario $horario) {
    


    }

    public function edit(Horario $horario) {
    


    }

    public function update(Request $request, Horario $horario) {
    


    }

    public function destroy(Horario $horario) {
    


    }
}
