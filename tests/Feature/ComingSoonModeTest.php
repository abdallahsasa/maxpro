<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter;
use Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect;
use Tests\TestCase;

class ComingSoonModeTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutMiddleware([
            LocaleSessionRedirect::class,
            LaravelLocalizationRedirectFilter::class,
        ]);
    }

    public function test_guests_see_coming_soon_page_when_coming_soon_is_enabled(): void
    {
        Config::set('app.coming_soon', true);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('coming-soon');
        $response->assertSee('L’Excellence des');
        $response->assertSee('info@maxprosols.fr');
    }

    public function test_guests_see_coming_soon_page_on_subpages(): void
    {
        Config::set('app.coming_soon', true);

        $response = $this->get('/services');

        $response->assertStatus(200);
        $response->assertViewIs('coming-soon');
    }

    public function test_admin_login_remains_accessible(): void
    {
        Config::set('app.coming_soon', true);

        $response = $this->get('/admin/login');

        $response->assertStatus(200);
    }

    public function test_authenticated_admin_can_bypass_coming_soon_and_see_website(): void
    {
        Config::set('app.coming_soon', true);

        $user = User::factory()->create([
            'email' => 'admin@maxpro.test',
        ]);

        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('welcome');
        $response->assertSee('Mode Aperçu Administrateur');
    }

    public function test_guests_can_see_full_site_when_coming_soon_is_disabled(): void
    {
        Config::set('app.coming_soon', false);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('welcome');
        $response->assertDontSee('L’Excellence des');
    }
}
