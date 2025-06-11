<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\AsistenteResource;
use App\Http\Traits\CanLoadRelationships;
use App\Models\Asistente;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class AsistenteController extends Controller
{
    use CanLoadRelationships, AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Asistente::class, 'asistente');
    }


    public function index()
    {
        $query = $this->loadRelationships(Asistente::query());
        return AsistenteResource::collection($query->latest()->get());
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|min:3|max:60',
            'apellido' => 'required|string|min:1|max:60',
            'email' => 'required|email',
            'usuario' => 'required|string|min:3|max:30',
            'password' => 'required|string|min:8|max:60',
            'telefono' => 'nullable|string',
            'fecha_nacimiento' => 'required|date'
        ]);


        $validatedData['password'] = Hash::make($validatedData['password']);

        $asistente = Asistente::create($validatedData);

        return new AsistenteResource($this->loadRelationships($asistente));
    }


    public function show(Asistente $asistente)
    {
        return new AsistenteResource($this->loadRelationships($asistente));
    }


    public function update(Request $request, Asistente $asistente)
    {
        $asistente->update(
            $request->validate([
                'nombre' => 'sometimes|string|min:3|max:60',
                'apellido' => 'sometimes|string|min:1|max:60',
                'email' => 'sometimes|email',
                'usuario' => 'sometimes|string|min:3|max:30',
                'password' => 'sometimes|string|min:8|max:60',
                'telefono' => 'sometimes|string',
                'fecha_nacimiento' => 'sometimes|date'
            ])
        );

        return new AsistenteResource($this->loadRelationships($asistente));
    }


    public function destroy(Asistente $asistente)
    {
        $asistente->delete();

        return response()->json(["message" => "Asistente eliminado correctamente"], 204);
        
    }
}
