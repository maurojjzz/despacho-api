<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\CanLoadRelationships;
use App\Models\Abogado;
use App\Http\Resources\AbogadoResource;
use Illuminate\Http\Request;

class AbogadoController extends Controller
{
    use CanLoadRelationships;

    private array $relations = ['agendas'];


    public function index()
    {
        $query = $this->loadRelationships(Abogado::query());

        return AbogadoResource::collection($query->latest()->get());
    }

    public function store(Request $request)
    {
        $abogado = Abogado::create(
            $request->validate([
                'nombre' => 'required|string|min:3|max:60',
                'apellido' => 'required|string|min:1|max:60',
                'matricula' => 'required|string',
                'email' => 'required|email',
                'password' => 'required|string|min:8|max:60',
                'fecha_nacimiento' => 'required|date',
                'telefono' => 'nullable|string',
                'domicilio' => 'nullable|string',
                'especialidad' => 'nullable|string',

            ])
        );
        return new AbogadoResource($this->loadRelationships($abogado));
    }

    public function show(Abogado $abogado)
    {
        return new AbogadoResource($this->loadRelationships($abogado));
    }


    public function update(Request $request, Abogado $abogado)
    {
        $abogado->update(
            $request->validate([
                'nombre' => 'sometimes|string|min:3|max:60',
                'apellido' => 'sometimes|string|min:1|max:60',
                'matricula' => 'sometimes|string',
                'email' => 'sometimes|email',
                'password' => 'sometimes|string|min:8|max:60',
                'fecha_nacimiento' => 'sometimes|date',
                'telefono' => 'nullable|string',
                'domicilio' => 'nullable|string',
                'especialidad' => 'nullable|string',
            ])
        );
        return new AbogadoResource($this->loadRelationships($abogado));
    }

    public function destroy(Abogado $abogado)
    {
        $abogado->delete();

        return response()->json(["message" => "Abogado eliminado correctamente"], 204);
    }
}
