<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\TipoEventoResource;
use App\Http\Traits\CanLoadRelationships;
use App\Models\TipoEvento;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TipoEventoController extends Controller
{

    use CanLoadRelationships, AuthorizesRequests;

    // public function __construct()
    // {
    //     $this->middleware('auth:sanctum');
    //     $this->authorizeResource(TipoEvento::class, 'tipo_evento');
    // }
    
    public function index()
    {
        $query = $this->loadRelationships(TipoEvento::query());
        return TipoEventoResource::collection($query->latest()->get());
    }

   
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'descripcion' => 'required',
            'cantidad_JUS' => 'required|integer'
        ]);
        $tipo_evento = TipoEvento::create($validatedData);
        return new TipoEventoResource($this->loadRelationships($tipo_evento));
    }

    
    public function show(TipoEvento $tipo_evento)
    {
        return new TipoEventoResource($this->loadRelationships($tipo_evento));
    }

   
    public function update(Request $request, TipoEvento $tipo_evento)
    {
        $tipo_evento->update(
            $request->validate([
                'descripcion' => 'sometimes',
                'cantidad_JUS' => 'sometimes|integer'
            ])
        );
        return new TipoEventoResource($this->loadRelationships($tipo_evento));
    }

   
    public function destroy(TipoEvento $tipo_evento)
    {
        $tipo_evento->delete();
        return response()->json(["message" => "Tipo evento eliminado correctamente"], 204);
    }
}
