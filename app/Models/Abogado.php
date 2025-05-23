<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Abogado extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = ['nombre', 'apellido', 'matricula', 'email', 'password', 'fecha_nacimiento', 'telefono', 'domicilio', 'especialidad'];

    public function agendas()
    {
        return $this->hasMany(Agenda::class);
    }

}
