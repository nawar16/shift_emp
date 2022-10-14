<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShiftResource extends JsonResource
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
            "workerShiftId" => $this->id,
            "shiftId" => $this->shift_id,
            "shiftStartTime" => $this->shifts->start,
            "shiftEndTime" => $this->shifts->end,
            "shiftDay" => $this->shift_day,
        ];
    }
}
