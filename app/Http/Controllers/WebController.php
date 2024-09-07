<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Consultorio;

class WebController extends Controller
{
    public function index() {

        /* try {

            $horarios = Horario::with('doctor', 'consultorio')->where('consultorio_id', $id)->get();

            return view('admin.horarios.cargar_datos_consultorios', compact('horarios'));

        } catch (\Exception $exception) {

            return response()->json(['mensaje' => 'Error']); 

        } */

        $consultorios = Consultorio::all();

        return view('index', compact('consultorios'));

    }

    public function cargar_datos_consultorios($id) {

        $consultorio = Consultorio::find($id);

        try {

            $horarios = Horario::with('doctor', 'consultorio')->where('consultorio_id', $id)->get();

            return view('cargar_datos_consultorios', compact('horarios', 'consultorio'));

        } catch (\Exception $exception) {

            return response()->json(['mensaje' => 'Error']); 

        }

    }

}
