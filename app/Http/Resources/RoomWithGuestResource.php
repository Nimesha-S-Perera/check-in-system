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
            'roomType' => $this->roomType,
            'status' => $this->status,
            'checkInDate'=>$this->checkInDate,
            'checkOutDate'=>$this->checkOutDate,
            'stayType'=>$this->stayType,
            'guest' => $this->when($this->status == "1", [
                'name' => $this->name,
                'nic' => $this->nic,
                'contactNumber' => $this->contactNumber
            ], null)
        ];

    }
}
