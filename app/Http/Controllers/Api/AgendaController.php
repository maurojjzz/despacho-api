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

        return AgendaResource::collection($agendas) ;
    }

   
    public function store(Request $request, Abogado $abogado)
    {

        $validated = $request->validate([
            'fecha_hora_inicio' => 'required|dateTime', 
            'duracion' => 'required|time',
            'estado' => 'required|string|in:pendiente,confirmado,cancelado',
        ]);

        $agenda = $abogado->agendas()->create($validated);

        return new AgendaResource($agenda);
    }


    public function show(Agenda $agenda, Abogado $abogado)
    {
        
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
