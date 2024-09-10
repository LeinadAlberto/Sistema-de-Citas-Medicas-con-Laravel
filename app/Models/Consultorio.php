<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ubicacion',
        'capacidad',
        'telefono',
        'especialidad',
        'estado'
    ];

    public function doctores() {

        return $this->hasMany(Doctor::class);

    }

    public function horarios() {

        return $this->hasMany(Horario::class);

    }

    /* Define una relación que indica que un Consultorio puede tener muchos Eventos */
    public function events() {

        return $this->hasMany(Event::class);/* Relación uno a muchos, significa que un Consultorio puede estar relacionado con múltiples Eventos. */

    }

}
