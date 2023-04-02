<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomWithGuestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'roomNo' => $this->roomNo,
            'roomSuite' => $this->roomSuite,
            'status' => $this->status,
            'guest' => $this->when($this->status == 1, [
                'name' => $this->name,
                'nic' => $this->nic,
                'contact_number' => $this->contact_number
            ], null)
        ];

    }
}
