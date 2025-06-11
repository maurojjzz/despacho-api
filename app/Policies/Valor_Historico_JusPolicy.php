<?php

namespace App\Policies;

use App\Models\Abogado;
use App\Models\Valor_Historico_Jus;
use Illuminate\Auth\Access\Response;

class Valor_Historico_JusPolicy
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
    public function view(?Abogado $abogado, Valor_Historico_Jus $valorHistoricoJu): bool
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
    public function update(Abogado $abogado, Valor_Historico_Jus $valorHistoricoJu): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Abogado $abogado, Valor_Historico_Jus $valorHistoricoJu): bool
    {
        return true;
    }

}
