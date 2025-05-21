<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ClienteResource;
use App\Http\Traits\CanLoadRelationships;
use Illuminate\Routing\Controller;
use App\Models\Cliente;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    use CanLoadRelationships, AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Cliente::class, 'cliente');
    }


    public function index()
    {
        $query = $this->loadRelationships(Cliente::query());
        return ClienteResource::collection($query->latest()->get());
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|min:3|max:60',
            'apellido' => 'required|string|min:1|max:60',
            'dni' => 'required|integer',
            'email' => 'required|email',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'nullable|string',
            'domicilio' => 'nullable|string'
        ]);

        $client = Cliente::create($validatedData);

        return new ClienteResource($this->loadRelationships($client));
    }


    public function show(string $id)
    {
        return new ClienteResource($this->loadRelationships(Cliente::find($id)));
    }


    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update(
            $request->validate([
                'nombre' => 'sometimes|string|min:3|max:60',
                'apellido' => 'sometimes|string|min:1|max:60',
                'dni' => 'sometimes|integer',
                'email' => 'sometimes|email',
                'fecha_nacimiento' => 'sometimes|date',
                'telefono' => 'nullable|string',
                'domicilio' => 'nullable|string'
            ])
        );

        return new ClienteResource($this->loadRelationships($cliente));

    }


    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return response()->json(["message" => "Abogado eliminado correctamente"], 204);
    }
}
