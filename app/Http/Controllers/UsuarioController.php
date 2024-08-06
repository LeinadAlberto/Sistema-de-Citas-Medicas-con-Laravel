<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    
    public function index() {

        $usuarios = User::all();

        return view('admin.usuarios.index', compact('usuarios'));

    }

    public function create() {

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

    public function show($id) {
        
        $usuario = User::findOrFail($id);

        return view('admin.usuarios.show', compact('usuario'));
        
    }

    public function edit($id) {

        $usuario = User::findOrFail($id);

        return view('admin.usuarios.edit', compact('usuario'));

    }

    public function update(Request $request, $id) {

        $usuario = User::find($id);

        $request->validate([

            'name'=>'required|max:250',

            /*  
                Especifica que el valor del campo 'email' debe ser único en la columna 'email' de la tabla 'users', 
                excepto para el registro que tiene el mismo 'id' que '$usuario->id'.  
            */
            'email'=>'required|max:250|unique:users,email,'.$usuario->id, 

            'password'=>'nullable|max:250|confirmed'

        ]);

       
        $usuario->name = $request->name;

        $usuario->email = $request->email;

        if ( $request->filled('password') ) {

            $usuario->password = Hash::make($request['password']);

        }

        $usuario->save();

        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', 'Usuario modificado exitosamente.')
            ->with('icono', 'success');

    }

    public function confirmDelete($id) {

        /* 
            Se intenta encontrar un usuario por su 'id' y, si no lo encuentra, 
            captura la excepción y devuelve una respuesta JSON con un mensaje de error 
            y un código de estado HTTP 404. 
        */

        $usuario = User::findOrFail($id);

        return view('admin.usuarios.delete', compact('usuario'));

    }

    public function destroy($id) {

        User::destroy($id);

        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', 'Usuario eliminado exitosamente.')
            ->with('icono', 'success');
    }

}
