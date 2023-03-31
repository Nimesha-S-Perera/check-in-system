<?php


// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GuestTest extends TestCase
{
    /**
     * A basic test example.
     */

    public function test_if_all_guests_can_view(): void
    {
        $response = $this->get('api/guests');
        $bookingsdetails = $response->json();
        dd($bookingsdetails);
        $response->assertStatus(200);
    }
    public function test_if_guest_can_update(): void
    {
        $response = $this->put('api/guest/2',['name' => 'Nimesha Perera']);
        $response->assertStatus(200);
    }
}
