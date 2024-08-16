<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use Illuminate\Http\Request;

class ConsultorioController extends Controller
{
    public function index() {
        
        $consultorios = Consultorio::all();

        return view('admin.consultorios.index', compact('consultorios'));

    }

    public function create() {
        
        return view('admin.consultorios.create');

    }

    public function store(Request $request) {
        
        /* $datos = request()->all();

        return response()->json($datos); */  

        $request->validate([

            'nombre'=>'required',
            'ubicacion'=>'required',
            'capacidad'=>'required',
            'especialidad' => 'required',
            'estado'=>'required'
    
        ]);

        Consultorio::create($request->all());

        return redirect()->route('admin.consultorios.index')
        ->with('mensaje', 'Consultorio registrado exitosamente.')
        ->with('icono', 'success');

    }

    public function show(Consultorio $consultorio) {
        
    }

    public function edit(Consultorio $consultorio) {
        
    }

    public function update(Request $request, Consultorio $consultorio) {
        
    }

    public function destroy(Consultorio $consultorio) {
        
    }
}
