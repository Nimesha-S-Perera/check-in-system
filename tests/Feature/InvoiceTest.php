<?php


// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvoiceTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_if_all_invoices_can_view(): void
    {
        $response = $this->get('api/invoices');
        $bookingsdetails = $response->json();
        dd($bookingsdetails);
        $response->assertStatus(200);
    }
}
