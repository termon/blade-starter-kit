<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HelpPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_standard_content_route_renders_inside_the_navbar_layout(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('about'));

        $response
            ->assertOk()
            ->assertSee('About');
    }

    public function test_help_page_renders_the_starter_kit_documentation(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('help'));

        $response
            ->assertOk()
            ->assertSee('Documentation')
            ->assertSee('Core Pages')
            ->assertSee('Features');
    }

    public function test_traits_help_page_documents_the_current_trait_capabilities(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('help', ['page' => 'features/traits']));

        $response
            ->assertOk()
            ->assertSee('Accepted values and lifecycle')
            ->assertSee('Custom stored filenames')
            ->assertSee('direct relationship columns')
            ->assertSee('multi-column sorting')
            ->assertSee('EnumOptions');
    }
}
