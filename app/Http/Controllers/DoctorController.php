<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function index() {
        
        $doctores = Doctor::with('user')->get();

        return view('admin.doctores.index', compact('doctores'));

    }

    public function create() {

        return view('admin.doctores.create');
        
    }

    public function store(Request $request) {
        
        /* $datos = request()->all();

        return response()->json($datos); */ 

        $request->validate([

            'nombres'=>'required',
            'apellidos'=>'required',
            'telefono'=>'required',
            'licencia_medica'=>'required',
            'especialidad'=>'required',
            'email'=>'required|max:250|unique:users',
            'password'=>'required|max:250|confirmed'

        ]);

        $usuario = new User();

        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->save();

        $doctor = new Doctor();

        $doctor->user_id = $usuario->id;
        $doctor->nombres = $request->nombres;
        $doctor->apellidos = $request->apellidos;
        $doctor->telefono = $request->telefono;
        $doctor->licencia_medica = $request->licencia_medica;
        $doctor->especialidad = $request->especialidad;

        $doctor->save();

        return redirect()->route('admin.doctores.index')
            ->with('mensaje', 'Doctor registrado exitosamente.')
            ->with('icono', 'success');

    }

    public function show($id) {
        
    }

    public function edit($id) {
        
    }

    public function update(Request $request, $id) {
        
    }

    public function destroy($id) {
        
    }
}
