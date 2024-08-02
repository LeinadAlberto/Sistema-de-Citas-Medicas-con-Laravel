<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all();

        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        /* $usuarios = User::all(); */

        return view('admin.usuarios.create');
    }

    public function store(Request $request) {

        /* $datos = request()->all();

        return response()->json($datos); */

        $request->validate([
            'name'=>'required|max:250',
            'email'=>'required|max:250|unique:users',
            'password'=>'required|max:250|confirmed'
        ]);

        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->save();

        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', 'Usuario registrado exitosamente.')
            ->with('icono', 'success');
    }
}
