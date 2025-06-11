<?php

namespace App\Policies;

use App\Models\Abogado;
use App\Models\Asistente;
use Illuminate\Auth\Access\Response;

class AsistentePolicy
{
   
    public function viewAny(?Abogado $abogado): bool
    {
        return true;
    }

   
    public function view(?Abogado $abogado, Asistente $asistente): bool
    {
        return true;
    }

   
    public function create(Abogado $abogado): bool
    {
        return true;
    }

   
    public function update(Abogado $abogado, Asistente $asistente): bool
    {
        return true;
    }

  
    public function delete(Abogado $abogado, Asistente $asistente): bool
    {
        return true;
    }

  
}
