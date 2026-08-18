<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BusinessResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'businesses',
            'id' => $this->id,
            'attributes' => [
                'user_id' => $this->user_id,
                'name' => $this->name,
                'description' => $this->description,
                'phone' => $this->phone,
                'address' => $this->address,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'relationships' => [
                'user' => new UserResource($this->whenLoaded('user')),
            ],
        ];
    } 
}
