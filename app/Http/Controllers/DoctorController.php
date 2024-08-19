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
        
        $doctor = Doctor::with('user')->findOrFail($id);

        return view('admin.doctores.show', compact('doctor'));

    }

    public function edit($id) {
        
        $doctor = Doctor::with('user')->findOrFail($id);

        return view('admin.doctores.edit', compact('doctor'));

    }

    public function update(Request $request, $id) {
        
        $doctor = Doctor::find($id);

        $request->validate([

            'nombres'=>'required|max:100',
            'apellidos'=>'required|max:100',
            'telefono'=>'required|max:50',
            'licencia_medica'=>'required|max:50',
            'especialidad'=>'required|max:100',
            'email'=>'required|max:100|unique:users,email,'.$doctor->user->id, 
            'password'=>'nullable|max:100|confirmed'

        ]);

        $doctor->nombres = $request->nombres;
        $doctor->apellidos = $request->apellidos;
        $doctor->telefono = $request->telefono;
        $doctor->licencia_medica = $request->licencia_medica;
        $doctor->especialidad = $request->especialidad;
        
        $doctor->save();

        $usuario = User::find($doctor->user->id);

        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        
        if ( $request->filled('password') ) {

            $usuario->password = Hash::make($request['password']);

        }

        $usuario->save();

        return redirect()->route('admin.doctores.index')
            ->with('mensaje', 'Registro modificado exitosamente.')
            ->with('icono', 'success');

    }

    public function destroy($id) {
        
    }
}
