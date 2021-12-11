<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\ReminderMemberResource;

class ReminderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'house_id' => $this->house_id,
          'poster_id' => $this->poster_id,
          'reminder' => $this->reminder,
          'start_date' => $this->start_date,
          'end_date' => $this->end_date,
          'is_active' => $this->is_active,
          'members' => ReminderMemberResource::collection($this->members)
        ];
        return parent::toArray($request);
    }
}
