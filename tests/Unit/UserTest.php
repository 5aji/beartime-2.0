<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\User;

class UserTest extends TestCase
{
    public function testUserBelongsToRole()
    {
        $user = factory(User::class)->make();
        $this->assertInstanceOf(BelongsTo::class, $user->role());
    }

    public function testUserHasManyClasses()
    {
        $user = factory(User::class)->make();
        $this->assertInstanceOf(HasMany::class, $user->classes());
    }

    public function testUserHasRolesReturnsTrueWhenItHasTheRole() {
        $user = factory(User::class)->create();
        $this->assertTrue($user->hasRoles(['user']));
        $adminUser = factory(User::class)->states(['is_admin'])->create();
        $this->assertTrue($adminUser->hasRoles(['admin']));
        $user->delete();
        $adminUser->delete();
    }
}
