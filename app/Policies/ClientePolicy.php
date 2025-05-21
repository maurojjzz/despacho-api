<?php

namespace App\Policies;

use App\Models\Abogado;
use App\Models\Cliente;
use Illuminate\Auth\Access\Response;

class ClientePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Abogado $abogado): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Abogado $abogado, Cliente $cliente): bool
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
    public function update(Abogado $abogado, Cliente $cliente): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Abogado $abogado, Cliente $cliente): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Abogado $abogado, Cliente $cliente): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Abogado $abogado, Cliente $cliente): bool
    {
        return false;
    }
}
