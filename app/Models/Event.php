<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /*  
        Un Evento esta asociado con un solo Usuario, mientras que un Usuario
        puede tener muchos Eventos. 
    */
    public function user() {
    
        return $this->belongsTo(User::class);

    }

    public function doctor() {
    
        return $this->belongsTo(Doctor::class);

    }

    public function consultorio() {
    
        return $this->belongsTo(Consultorio::class);

    }

    
}
