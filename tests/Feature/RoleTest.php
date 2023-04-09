<?php


// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_if_all_roles_can_view(): void
    {
        $response = $this->get('api/roles');
        $bookingsdetails = $response->json();
        dd($bookingsdetails);
        $response->assertStatus(200);
    }

    public function test_if_new_role_can_be_added(): void
    {
        $response = $this->post('api/role',[
            'roleType' => 'Security',
        ]);
        $response->assertStatus(200);
    }

    public function test_if_role_can_update(): void
    {
        $response = $this->put('api/role/2',['' => '']);
        $response->assertStatus(200);
    }

    public function test_if_role_can_delete(): void
    {
        $response = $this->delete('api/role/3');
        $response->assertStatus(200);
    }
}
