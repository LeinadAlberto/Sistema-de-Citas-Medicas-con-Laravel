<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Secretaria;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class SecretariaController extends Controller
{
    public function index() {

        $secretarias = Secretaria::with('user')->get();

        return view('admin.secretarias.index', compact('secretarias'));

    }

    public function create() {

        return view('admin.secretarias.create');

    }

    public function store(Request $request) {

        /* $datos = request()->all();

        return response()->json($datos);  */

        $request->validate([

            'nombres'=>'required',

            'apellidos'=>'required',

            'ci'=>'required|unique:secretarias',

            'celular'=>'required',

            'fecha_nacimiento'=>'required',
            
            'direccion'=>'required',

            'email'=>'required|max:250|unique:users',

            'password'=>'required|max:250|confirmed'

        ]);

        $usuario = new User();

        $usuario->name = $request->nombres;

        $usuario->email = $request->email;

        $usuario->password = Hash::make($request['password']);

        $usuario->save();

        $secretaria = new Secretaria();

        $secretaria->user_id = $usuario->id;

        $secretaria->nombres = $request->nombres;

        $secretaria->apellidos = $request->apellidos;

        $secretaria->ci = $request->ci;

        $secretaria->celular = $request->celular;

        $secretaria->fecha_nacimiento = $request->fecha_nacimiento;

        $secretaria->direccion = $request->direccion;

        $secretaria->save();

        return redirect()->route('admin.secretarias.index')
            ->with('mensaje', 'Secretaria registrada exitosamente.')
            ->with('icono', 'success');


    }

    public function show($id) {

        $secretaria = Secretaria::with('user')->findOrFail($id);

        return view('admin.secretarias.show', compact('secretaria'));

    }

    public function edit(Secretaria $secretaria) {
    }

    public function update(Request $request, Secretaria $secretaria) {
    }

    public function destroy(Secretaria $secretaria) {
    }
}
