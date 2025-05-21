<?php

namespace App\Http\Controllers\Api;

use App\Models\Expediente;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Traits\CanLoadRelationships;
use App\Http\Resources\ExpedienteResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class ExpedienteController extends Controller
{
    use CanLoadRelationships, AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Expediente::class, 'expediente');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = $this->loadRelationships(Expediente::query());
        return ExpedienteResource::collection($query->latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'formato' => 'required|string|min:2',
            'fecha_hora_subida' => 'required|date_format:Y-m-d H:i:s',
            'url' => 'required|string'
        ]);
        $expediente = Expediente::create($validatedData);
        return new ExpedienteResource($this->loadRelationships($expediente));
    }

    /**
     * Display the specified resource.
     */
    public function show(Expediente $expediente)
    {
        return new ExpedienteResource($this->loadRelationships($expediente));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expediente $expediente)
    {
        $expediente->update(
            $request->validate([
                'formato' => 'sometimes|string|min:2',
                'fecha_hora_subida' => 'sometimes|date_format:Y-m-d H:i:s',
                'url' => 'sometimes|string'
            ])
        );
        return new ExpedienteResource($this->loadRelationships($expediente));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expediente $expediente)
    {
        $expediente->delete();
        return response()->json(["message" => "Expediente eliminado correctamente"], 204);
        
    }
}
