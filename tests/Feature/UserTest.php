<?php


// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_if_all_users_can_view(): void
    {
        $response = $this->get('api/users');
        $bookingsdetails = $response->json();
        dd($bookingsdetails);
        $response->assertStatus(200);
    }

    public function test_if_user_can_update(): void
    {
        $response = $this->put('api/user/2',['' => '']);
        $response->assertStatus(200);
    }
}
