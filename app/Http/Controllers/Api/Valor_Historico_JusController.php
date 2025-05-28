<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Valor_Historico_JusResource;
use App\Http\Traits\CanLoadRelationships;
use App\Models\Valor_Historico_Jus;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Valor_Historico_JusController extends Controller
{

    use CanLoadRelationships, AuthorizesRequests;

    // public function __construct()
    // {
    //     $this->middleware('auth:sanctum');
    //     $this->authorizeResource(Expediente::class, 'expediente');
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = $this->loadRelationships(Valor_Historico_Jus::query());
        return Valor_Historico_JusResource::collection($query->latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fecha_desde' => 'required|date_format:Y-m-d H:i:s',
            'valor_JUS' => 'required|decimal:0,2'
        ]);
        $valor_historico_jus = Valor_Historico_Jus::create($validatedData);
        return new Valor_Historico_JusResource($this->loadRelationships($valor_historico_jus));
    }

    /**
     * Display the specified resource.
     */
    public function show(Valor_Historico_Jus $valor_historico_jus)
    {
        return new Valor_Historico_JusResource($this->loadRelationships($valor_historico_jus));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Valor_Historico_Jus $valor_historico_jus)
    {
        $valor_historico_jus->update(
            $request->validate([
                'fecha_desde' => 'sometimes|date_format:Y-m-d H:i:s',
                'valor_JUS' => 'sometimes|decimal:0,2'
            ])
        );
        return new Valor_Historico_JusResource($this->loadRelationships($valor_historico_jus));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Valor_Historico_Jus $valor_historico_jus)
    {
        $valor_historico_jus->delete();
        return response()->json(["message" => "Valor historico Jus eliminado correctamente"], 204);
        
    }
}
