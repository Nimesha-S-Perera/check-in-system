<?php


// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PackageTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_if_all_packages_can_view(): void
    {
        $response = $this->get('api/packages');
        $bookingsdetails = $response->json();
        dd($bookingsdetails);
        $response->assertStatus(200);
    }
}
