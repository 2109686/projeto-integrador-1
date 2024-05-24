<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServicesResource extends JsonResource
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
            'activity_date' => $this->activity_date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'collaborator_name' => $this->collaborator_name,
            'cpf' => $this->cpf,
            'activity_name' => $this->activity_name,
            'mobile_number' => $this->mobile_number,
            'room' => $this->room,
            'company' => $this->company,
            'responsible' => $this->responsible,
            'materials_used' => $this->materials_used,
            'cordage_length' => $this->cordage_length,
            'from_row' => $this->from_row,
            'from_rack' => $this->from_rack,
            'to_row' => $this->to_row,
            'to_rack' => $this->to_rack,
        ];
    }
}
