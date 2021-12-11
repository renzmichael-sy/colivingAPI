<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\HouseMemberResource;

class ReminderMemberResource extends JsonResource
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
          'reminder_id' => $this->id,
          'is_visible' => $this->is_visible,
          'house_member' => new HouseMemberResource($this->house_member)
        ];
    }
}
