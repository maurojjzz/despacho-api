<?php

namespace App\Policies;

use App\Models\Abogado;
use App\Models\TipoEvento;
use Illuminate\Auth\Access\Response;

class TipoEventoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?Abogado $abogado): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?Abogado $abogado, TipoEvento $tipoEvento): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Abogado $abogado): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Abogado $abogado, TipoEvento $tipoEvento): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Abogado $abogado, TipoEvento $tipoEvento): bool
    {
        return true;
    }
}
