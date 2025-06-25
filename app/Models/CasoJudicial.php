<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasoJudicial extends Model
{
    use HasFactory;
    
    protected $table = 'casos_judiciales';

    protected $fillable = [
        'fecha_hora_creacion',
        'estado_caso',
        'caso_total',
        'fecha_hora_fin',
        'cant_total_JUS',
        'estado_pago'
    ];
}
