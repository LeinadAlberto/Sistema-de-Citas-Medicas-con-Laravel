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

    public function edit($id) {

        $secretaria = Secretaria::with('user')->findOrFail($id);

        return view('admin.secretarias.edit', compact('secretaria'));

    }

    public function update(Request $request, $id) {

        $secretaria = Secretaria::find($id);

        $request->validate([

            'nombres'=>'required|max:100',
            'apellidos'=>'required|max:100',
            'celular'=>'required|max:50',
            'ci'=>'required|max:50|unique:secretarias,ci,'.$secretaria->id,
            'fecha_nacimiento'=>'required|max:100',
            'direccion'=>'required|max:100',

            /*  
                Especifica que el valor del campo 'email' debe ser único en la columna 'email' de la tabla 'users', 
                excepto para el registro que tiene el mismo 'id' que '$secretaria->user->id'.  
            */
            'email'=>'required|max:100|unique:users,email,'.$secretaria->user->id, 
            'password'=>'nullable|max:100|confirmed'

        ]);

        $secretaria->nombres = $request->nombres;
        $secretaria->apellidos = $request->apellidos;
        $secretaria->ci = $request->ci;
        $secretaria->celular = $request->celular;
        $secretaria->fecha_nacimiento = $request->fecha_nacimiento;
        $secretaria->direccion = $request->direccion;

        $secretaria->save();

        $usuario = User::find($secretaria->user->id);

        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        
        if ( $request->filled('password') ) {

            $usuario->password = Hash::make($request['password']);

        }

        $usuario->save();

        return redirect()->route('admin.secretarias.index')
            ->with('mensaje', 'Secretaria modificada exitosamente.')
            ->with('icono', 'success');

    }

    public function destroy(Secretaria $secretaria) {
    }
}
