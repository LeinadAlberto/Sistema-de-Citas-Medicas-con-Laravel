<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index() {

        $pacientes = Paciente::all();

        return view('admin.pacientes.index', compact('pacientes'));
        
    }

    public function create() {
        
         return view('admin.pacientes.create');

    }

    public function store(Request $request) {

        /* $datos = request()->all();

        return response()->json($datos);  */

        $request->validate([

            'nombres'=>'required',
            'apellidos'=>'required',
            'ci'=>'required|unique:pacientes',
            'nro_seguro' => 'unique:pacientes',
            'fecha_nacimiento' => 'required',
            'genero' => 'required',
            'celular'=>'required',
            'correo'=>'required|max:250|unique:pacientes',
            'direccion'=>'required',
            'grupo_sanguineo'=>'required',
            'contacto_emergencia' => 'required',
            
        ]);

        $paciente = new Paciente();

        $paciente->nombres = $request->nombres;
        $paciente->apellidos = $request->apellidos;
        $paciente->ci = $request->ci;
        $paciente->nro_seguro = $request->nro_seguro;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->genero = $request->genero;
        $paciente->celular = $request->celular;
        $paciente->correo = $request->correo;
        $paciente->direccion = $request->direccion;
        $paciente->grupo_sanguineo = $request->grupo_sanguineo;
        $paciente->alergias = $request->alergias;
        $paciente->contacto_emergencia = $request->contacto_emergencia;
        $paciente->observaciones = $request->observaciones;

        $paciente->save();

        return redirect()->route('admin.pacientes.index')
        ->with('mensaje', 'Paciente registrado exitosamente.')
        ->with('icono', 'success');
        
    }

    public function show(Paciente $paciente) {
        
    }

    public function edit(Paciente $paciente) {
        
    }

    public function update(Request $request, Paciente $paciente) {
        
    }

    public function destroy(Paciente $paciente) {
        
    }
}
