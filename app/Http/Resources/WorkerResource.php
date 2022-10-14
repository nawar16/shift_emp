<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkerResource extends JsonResource
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
            "workerId" => $this->id,
            "workerName" => $this->name,
            "workerPhone" => $this->phone,
            "workerEmail" => $this->email,
            "workerTimeZone" => $this->timezone->title,
            "workerShifts" => ShiftResource::collection($this->workerShifts)
        ];
    }
}
