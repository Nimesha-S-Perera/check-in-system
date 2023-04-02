<?php


// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_if_all_bookings_can_view(): void
    {
        $response = $this->get('api/bookings');
        $bookingsdetails = $response->json();
        dd($bookingsdetails);
        $response->assertStatus(200);
    }

    public function test_if_current_guests_can_view(): void
    {
        $response = $this->get('api/bookings?current_guest_only=true');
        $currentGuest = $response->json();
        dd($currentGuest);
        $response->assertStatus(200);
    }

    public function test_if_new_booking_can_add(): void
    {
        $response = $this->post('api/checkin',[
            'name' => 'Sanki Perera',
            'nic' => '123456789012',
            'contactNumber' => '0761275746',
            'roomID' => '20',
            'userID' => '2',
            'checkInDate' => '2023-03-27 11:28:41',
            'checkOutDate' => '2023-03-27 11:28:41',
            //0 = FB, 1 = BB
            'stayType' => '1',
        ]);
        $response->assertStatus(200);
    }
}
