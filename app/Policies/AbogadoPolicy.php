<?php

namespace App\Policies;

use App\Models\Abogado;
use Illuminate\Auth\Access\Response;

class AbogadoPolicy
{
    public function viewAny(?Abogado $authAbogado): bool
    {
        return true;
    }

    public function view(Abogado $authAbogado, Abogado $targetAbogado): bool
    {
        return $authAbogado->id === $targetAbogado->id;
    }

    public function create(Abogado $authAbogado): bool
    {
        return true;
    }

    public function update(Abogado $authAbogado, Abogado $targetAbogado): bool
    {
        return $authAbogado->id === $targetAbogado->id;
    }

    public function delete(Abogado $authAbogado, Abogado $targetAbogado): bool
    {
        return $authAbogado->id === $targetAbogado->id;
    }

    public function restore(Abogado $authAbogado, Abogado $targetAbogado): bool
    {
        return false;
    }

    public function forceDelete(Abogado $authAbogado, Abogado $targetAbogado): bool
    {
        return false;
    }
}
