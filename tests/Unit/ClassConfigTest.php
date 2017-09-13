<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\ClassConfig;

class ClassConfigTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserCanCreateClassConfig()
    {
        //
        $user = factory(User::class)->create();

        $user->classes()->save(factory(ClassConfig::class)->make());

        $this->assertTrue($user->classes()->count() == 1);
    }

    public function testUserCanSeeAllOfTheirClassConfigs()
    {
        $user = factory(User::class)->create();
        for ($i = 1; $i < 5; $i++) {
            $class = factory(ClassConfig::class)->make();
            $user->classes()->save($class);
            $this->assertInstanceOf(ClassConfig::class, $user->classes()->where('name', $class->name)->first());

        }
        $this->assertEquals($user->classes()->get()->count(), 4);
    }
}
