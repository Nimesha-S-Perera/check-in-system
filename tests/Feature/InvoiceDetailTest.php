<?php


// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvoiceDetailTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_if_all_invoice_details_can_view(): void
    {
        $response = $this->get('api/invoiceDetails');
        $bookingsdetails = $response->json();
        dd($bookingsdetails);
        $response->assertStatus(200);
    }
}
