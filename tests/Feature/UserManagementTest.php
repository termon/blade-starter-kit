<?php

namespace Tests\Feature;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_non_admin_cannot_view_the_user_index(): void
    {
        $user = User::factory()->create(['role' => Role::USER]);

        $this->actingAs($user)
            ->get(route('users.index'))
            ->assertForbidden();
    }

    public function test_admin_can_view_the_user_index(): void
    {
        $admin = User::factory()->create(['role' => Role::ADMIN]);
        $user = User::factory()->create(['role' => Role::USER]);

        $this->actingAs($admin)
            ->get(route('users.index'))
            ->assertOk()
            ->assertSee($user->email)
            ->assertSee(Role::USER->value);
    }

    public function test_non_admin_cannot_edit_or_promote_a_user(): void
    {
        $user = User::factory()->create(['role' => Role::USER]);

        $this->actingAs($user)
            ->get(route('users.edit', $user))
            ->assertForbidden();

        $this->actingAs($user)
            ->put(route('users.update', $user), [
                'name' => $user->name,
                'email' => $user->email,
                'role' => Role::ADMIN->value,
            ])
            ->assertForbidden();

        $this->assertSame(Role::USER, $user->fresh()->role);
    }

    public function test_admin_can_update_a_user_with_a_valid_role(): void
    {
        $admin = User::factory()->create(['role' => Role::ADMIN]);
        $user = User::factory()->create(['role' => Role::GUEST]);

        $this->actingAs($admin)
            ->put(route('users.update', $user), [
                'name' => 'Updated User',
                'email' => 'updated@example.com',
                'role' => Role::USER->value,
            ])
            ->assertRedirect(route('users.index'));

        $user->refresh();
        $this->assertSame('Updated User', $user->name);
        $this->assertSame(Role::USER, $user->role);
    }

    public function test_user_index_rejects_unapproved_sort_input(): void
    {
        $admin = User::factory()->create(['role' => Role::ADMIN]);

        $this->actingAs($admin)
            ->get(route('users.index', ['sort' => 'password']))
            ->assertSessionHasErrors(['sort']);
    }

    public function test_impersonation_actions_only_accept_post_requests(): void
    {
        $admin = User::factory()->create(['role' => Role::ADMIN]);
        $user = User::factory()->create(['role' => Role::USER]);

        $this->actingAs($admin)
            ->get(route('users.mirror.start', $user))
            ->assertMethodNotAllowed();

        $this->actingAs($admin)
            ->get(route('users.mirror.stop'))
            ->assertMethodNotAllowed();
    }

    public function test_sensitive_account_changes_are_blocked_while_impersonating(): void
    {
        $admin = User::factory()->create(['role' => Role::ADMIN]);
        $user = User::factory()->create(['role' => Role::USER]);

        $this->actingAs($admin)
            ->post(route('users.mirror.start', $user))
            ->assertRedirect(route('home'));

        $this->delete(route('settings.profile.destroy'), ['password' => 'password'])
            ->assertForbidden();

        $this->assertNotNull($user->fresh());
    }
}
