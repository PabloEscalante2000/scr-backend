<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "type" => "services",
            "id" => $this->id,
            "attributes" => [
                "name" => $this->name,
                "description" => $this->description,
                "price" => $this->price,
                "duration_minutes" => $this->duration_minutes,
                "business_id" => $this->business_id,
                "created_at" => $this->created_at,
                "updated_at" => $this->updated_at
            ],
            "relationships" => [
                "business" => new BusinessResource($this->whenLoaded('business'))
            ]
        ];
    }
}
