<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CasoJudicialResource;
use App\Http\Traits\CanLoadRelationships;
use App\Models\CasoJudicial;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CasoJudicialController extends Controller
{
    use CanLoadRelationships, AuthorizesRequests;

    // public function __construct()
    // {
    //     $this->middleware('auth:sanctum');
    //     $this->authorizeResource(CasoJudicial::class, 'caso_judicial');
    // }

    public function index()
    {
        $query = $this->loadRelationships(CasoJudicial::query());
        return CasoJudicialResource::collection($query->latest()->get());
    }

   
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fecha_hora_creacion' => 'required|date_format:Y-m-d H:i:s',
            'estado_caso' => 'required|boolean',
            'caso_total' => 'required|decimal:0,2',
            'fecha_hora_fin' => 'required|date_format:Y-m-d H:i:s',
            'cant_total_JUS' => 'required|integer',
            'estado_pago' => 'required|boolean',
        ]);
        $caso_judicial = CasoJudicial::create($validatedData);
        return new CasoJudicialResource($this->loadRelationships($caso_judicial));
    }

    
    public function show(CasoJudicial $caso_judicial)
    {
        return new CasoJudicialResource($this->loadRelationships($caso_judicial));
        
    }

   
    public function update(Request $request, CasoJudicial $caso_judicial)
    {
        $caso_judicial->update(
            $request->validate([
                'fecha_hora_creacion' => 'sometimes|date_format:Y-m-d H:i:s',
                'estado_caso' => 'sometimes|boolean',
                'caso_total' => 'sometimes|decimal:0,2',
                'fecha_hora_fin' => 'sometimes|date_format:Y-m-d H:i:s',
                'cant_total_JUS' => 'sometimes|integer',
                'estado_pago' => 'sometimes|boolean',
            ])
        );
        return new CasoJudicialResource($this->loadRelationships($caso_judicial));
    }

   
    public function destroy(CasoJudicial $caso_judicial)
    {
        $caso_judicial->delete();
        return response()->json(["message" => "Caso Judicial eliminado correctamente"], 204);
    }
}
