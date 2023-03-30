<?php


// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoomTest extends TestCase
{
    /**
     * A basic test example.
     */

    //To view all rooms
    public function test_if_all_rooms_can_view(): void
    {
        $response = $this->get('api/rooms');
        $rooms = $response->json();
        dd($rooms);
        $response->assertStatus(200);
    }

    //To view available room with correct room suite
    public function test_if_all_available_rooms_with_correct_room_suite_can_view(): void
    {
        $response = $this->post('api/rooms/available',[
            'roomSuite' => 1,
        ]);
        $bookingsdetails = $response->json();
        dd($bookingsdetails);
        $response->assertStatus(200);
    }

}
