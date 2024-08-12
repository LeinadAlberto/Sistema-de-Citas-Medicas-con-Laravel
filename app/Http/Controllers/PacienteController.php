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
