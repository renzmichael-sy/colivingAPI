<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
          'id' => $this-> id,
          'nickname' => $this->nickname,
          'firstname' => $this->firstname,
          'lastname' => $this->lastname,
          'email' => $this->email,
          'is_active' => $this->is_active,
          'created_at' => $this->created_at,
        ];
        return parent::toArray($request);
    }

    public function memberships(){
      return $this->hasMany('App\Models\HouseMember');
    }
}
