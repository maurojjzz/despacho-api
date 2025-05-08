<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Abogado;
use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Http\Resources\AgendaResource;

class AgendaController extends Controller
{

    public function index(Abogado $abogado)
    {

        $agendas = $abogado->agendas()->get();

        return AgendaResource::collection($agendas);
    }


    public function store(Request $request, Abogado $abogado)
    {

        $validated = $request->validate([
            'fecha_hora_inicio' => 'required|date',
            'duracion' => 'required|date_format:H:i:s',
            'estado' => 'required|string',
        ]);

        $agenda = $abogado->agendas()->create($validated);

        return new AgendaResource($agenda);
    }


    public function show(Abogado $abogado, $agendaId)
    {
        $agenda = $abogado->agendas()->where('id', $agendaId)->get();

        if ($agenda->isEmpty()) {
            return response()->json(['message' => 'Agenda no encontrada para este abogado'], 404);
        }

        return AgendaResource::collection($agenda);
    }


    public function update(Request $request, Abogado $abogado, $agendaId)
    {
        $agenda = $abogado->agendas()->where('id', $agendaId)->first();

        if (!$agenda) {
            return response()->json(['message' => 'Agenda no encontrada para este abogado'], 404);
        }

        $validated = $request->validate([
            'fecha_hora_inicio' => 'sometimes|date',
            'duracion' => 'sometimes|date_format:H:i:s',
            'estado' => 'sometimes|string',
        ]);

        $agenda->update($validated);

        return new AgendaResource($agenda);
    }

    public function destroy(Abogado $abogado, $agendaId)
    {
        $agenda = $abogado->agendas()->where('id', $agendaId)->first();

        if (!$agenda) {
            return response()->json(['message' => 'Agenda no encontrada para este abogado'], 404);
        }

        $agenda->delete();

        return response()->json(['message' => 'Agenda eliminada con exito']);
    }
}
