<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AbogadoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'matricula' => $this->matricula,
            'email' => $this->email,
            'password' => $this->password,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'telefono' => $this->telefono,
            'domicilio' => $this->domicilio,
            'especialidad' => $this->especialidad,

            'agendas'=> AgendaResource::collection($this->whenLoaded('agendas'))
        ];
    }
}
