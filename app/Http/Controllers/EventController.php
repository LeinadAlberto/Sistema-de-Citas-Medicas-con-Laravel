<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        /* $datos = request()->all();

        return response()->json($datos); */  

        $doctor = Doctor::find($request->doctor_id);

        $evento = new Event();

        $evento->title = $request->hora_reserva . " " . $doctor->especialidad;
        $evento->start = $request->fecha_reserva;
        $evento->end = $request->fecha_reserva;
        $evento->color = "#FF4848";
        $evento->user_id = Auth::user()->id;
        $evento->doctor_id = $request->doctor_id;
        $evento->consultorio_id = "1";

        $evento->save();

        return redirect()->route('admin.index')
        ->with('mensaje', 'Reserva de cita médica registrada exitosamente.')
        ->with('icono', 'success');

    }

    public function show(Event $event)
    {
        //
    }

    public function edit(Event $event)
    {
        //
    }

    public function update(Request $request, Event $event)
    {
        //
    }

    public function destroy(Event $event)
    {
        //
    }
}
