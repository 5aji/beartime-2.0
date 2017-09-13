<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserControllerTest extends TestCase
{
    public function testUserCanAccessHomePage() {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/home');

        $response->assertStatus(200);
    }
}
