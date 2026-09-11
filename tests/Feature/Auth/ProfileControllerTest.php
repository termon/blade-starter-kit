<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_can_be_updated_with_a_new_avatar(): void
    {
        $user = User::factory()->create([
            'avatar' => UploadedFile::fake()->image('old-avatar.jpg', 32, 32),
        ]);

        $oldAvatar = $user->avatar;

        $response = $this
            ->actingAs($user)
            ->put(route('settings.profile.update'), [
                'name' => 'Updated User',
                'email' => 'updated@example.com',
                'avatar' => UploadedFile::fake()->image('new-avatar.jpg', 128, 128),
            ]);

        $response->assertRedirect(route('settings.profile.edit'));

        $user->refresh();

        $this->assertSame('Updated User', $user->name);
        $this->assertSame('updated@example.com', $user->email);
        $this->assertNotSame($oldAvatar, $user->avatar);
        $this->assertStringStartsWith('data:image/', (string) $user->avatar);
        $this->assertTrue($user->avatar_exists);
        $this->assertTrue($user->avatar_is_image);
    }

    public function test_account_deletion_requires_the_current_password(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->delete(route('settings.profile.destroy'), ['password' => 'incorrect']);

        $response->assertSessionHasErrors(['password']);
        $this->assertNotNull($user->fresh());
        $this->assertAuthenticatedAs($user);
    }

    public function test_account_can_be_deleted_with_the_current_password(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->delete(route('settings.profile.destroy'), ['password' => 'password']);

        $response->assertRedirect(route('home'));
        $this->assertModelMissing($user);
        $this->assertGuest();
    }
}
