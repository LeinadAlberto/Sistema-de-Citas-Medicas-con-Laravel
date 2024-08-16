<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'telefono',
        'licencia_medica',
        'especialidad',
        'user_id'
    ];

    // Un doctor pertenece  a un consultorio
    public function consultorio() {

        return $this->belongsTo(Consultorio::class);

    }

    // Un doctor tiene muchos horarios
    public function horarios() {

        return $this->hasMany(Horario::class);

    }
}
