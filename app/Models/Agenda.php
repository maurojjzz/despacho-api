<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_hora_inicio',
        'duracion',
        'estado',
        'abogado_id',
    ];

    public function abogado()
    {
        return $this->belongsTo(Abogado::class);
    }
}
