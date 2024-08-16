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
        
    }

    public function store(Request $request) {
        
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
