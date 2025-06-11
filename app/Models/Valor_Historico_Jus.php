<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valor_Historico_Jus extends Model
{
    use HasFactory;

    protected $table = 'valor__historico__juses';

    protected $fillable = ['fecha_desde', 'valor_JUS'];

}
