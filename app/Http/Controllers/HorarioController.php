<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Consultorio;
use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index() {
    
        $horarios = Horario::with('doctor', 'consultorio')->get();

        $consultorios = Consultorio::all();

        return view('admin.horarios.index', compact('horarios', 'consultorios'));

    }

    public function create() {

        $doctores = Doctor::all();

        $consultorios = Consultorio::all();

        $horarios = Horario::with('doctor', 'consultorio')->get();
    
        return view('admin.horarios.create', compact('doctores', 'consultorios', 'horarios'));

    }

    public function store(Request $request) {
        
        // Validar los datos del formulario
        $request->validate([

            'dia'=>'required',
            'hora_inicio'=>'required|date_format:H:i', /* Valida que tenga un formato de hora de 24h */
            'hora_fin'=>'required|date_format:H:i|after:hora_inicio', /* Valida que hora_fin sea una hora posterior a la hora_inicio */
            'consultorio_id'=>'required|exists:consultorios,id' /* Valida que el valor proporcionado para 'consultorio_id' exista en la tabla 'consultorios', especificamente en la columna 'id' */
        ]);

        /* Objetivo: Comprobar si ya existe un horario en la base de datos que se superpone con el nuevo horario que se está intentando registrar. */
        $horarioExistente = Horario::where("dia", $request->dia) // Filtra los registros para que coincidan con el día (dia) especificado en la solicitud.
            ->where('consultorio_id', $request->consultorio_id) // Filtra los registros para que coincidan con el consultorio (consultorio_id) especificado en la solicitud.
            ->where(function ($query) use ($request) { // Añade una condición adicional, donde se verifica si hay un solapamiento en los horarios.
                /* Primer 'where': Busca horarios cuya hora_inicio está dentro del rango del nuevo horario */
                $query->where(function ($query) use ($request) {
                    $query->where("hora_inicio", ">=", $request->hora_inicio)
                        ->where("hora_inicio", "<", $request->hora_fin);
                })  /* Segundo 'orWhere': Busca horarios cuya hora_fin está dentro del rango del nuevo horario */
                    ->orWhere(function ($query) use ($request) {
                        $query->where("hora_fin", ">", $request->hora_inicio)
                        ->where("hora_fin", "<=", $request->hora_fin);
                })  /* Tercer 'orWhere': Busca horarios que abarcan completamente el rango del nuevo horario */
                    ->orWhere(function ($query) use ($request) {
                        $query->where("hora_inicio", "<", $request->hora_inicio)
                        ->where("hora_fin", ">", $request->hora_fin);
                });
            })
            /* Ejecuta la consulta y retorna true si existe al menos un registro que cumple con estas 
            condiciones, es decir, si hay un horario que se superpone */
            ->exists();
        
        if ($horarioExistente) { // Si existe un horario que se superpone con el que se está intentando registrar, se redirige de vuelta a la página anterior.
            return redirect()->back()
                ->withInput() // Mantiene los datos ingresados por el usuario en el formulario.
                ->with("mensaje", "Ya existe un horario que se superpone con el horario ingresado")
                ->with("icono", "error");
        }

        Horario::create($request->all());

        return redirect()->route('admin.horarios.create')
        ->with('mensaje', 'Horario registrado exitosamente.')
        ->with('icono', 'success');

    }

    public function show($id) {
    
        $horario = Horario::with('doctor', 'consultorio')->get()->find($id);

        return view('admin.horarios.show', compact('horario'));

    }

    public function edit(Horario $horario) {
    


    }

    public function update(Request $request, Horario $horario) {
    


    }

    public function destroy(Horario $horario) {
    


    }

    public function cargar_datos_consultorios($id) {

        try {

            $horarios = Horario::with('doctor', 'consultorio')->where('consultorio_id', $id)->get();

            /* print_r($horarios); */

            return view('admin.horarios.cargar_datos_consultorios', compact('horarios'));

        } catch (\Exception $exception) {

            return response()->json(['mensaje' => 'Error']); 

        }

    }
}
