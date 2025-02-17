<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class InfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'time_remaining' => $this->time_remaining,
            'gpa' => $this->gpa,
            'scholarship' => ScholarshipResource::make($this->scholarship),
        ];
    }
}
