<?php

namespace App\Policies;

use App\Models\Abogado;
use App\Models\Agenda;
use Illuminate\Auth\Access\Response;

class AgendaPolicy
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
    public function view(?Abogado $abogado, Agenda $agenda): bool
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
    public function update(Abogado $abogado, Agenda $agenda): bool
    {
        return $abogado->id === $agenda->abogado_id ;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Abogado $abogado, Agenda $agenda): bool
    {
        return $abogado->id === $agenda->abogado_id ;

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Abogado $abogado, Agenda $agenda): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Abogado $abogado, Agenda $agenda): bool
    {
        return false;
    }
}
