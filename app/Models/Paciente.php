<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory, HasRoles;

    protected $guard_name = 'web';
}
