<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\HouseMemberResource;
use App\Http\Resources\HouseResource;

class TransactionResource extends JsonResource
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
          'amount' => $this->amount,
          'date' => $this->date,
          'description' => $this->description,
          'is_active' => $this->is_active,
          'place' => $this->place,
          'due_date' => $this->due_date,
          'bill_period_start' => $this->bill_period_start,
          'bill_period_end' => $this->bill_period_end,
          'currency_code' => $this->currency_code,
          'poster' => new HouseMemberResource($this->poster)
        ];
    }
}
