<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminControllerTest extends TestCase
{


    public function testAdminCanUseAdminPage()
    {
        $admin = factory(User::class)->states(['is_admin'])->create();

        $response = $this->actingAs($admin)->get('/admin');

        $response->assertStatus(200);
    }

    public function testUserIsUnauthorizedToUseAdminPage()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/admin');

        $response->assertStatus(401);
    }
    public function testGuestGetsRedirectedToLogin() {
        $response = $this->get('/admin');

        $response->assertStatus(302); // redirect to login page.
    }
}
