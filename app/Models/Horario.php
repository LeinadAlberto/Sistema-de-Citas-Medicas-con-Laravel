<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'dia',
        'hora_inicio',
        'hora_fin',
        'doctor_id',
        'consultorio_id'
    ];

    // Un horario pertenece  a un doctor
    public function doctor() {

        return $this->belongsTo(Doctor::class);

    }

    // Un horario pertenece  a un consultorio
    public function consultorio() {

        return $this->belongsTo(Consultorio::class);

    }


}
