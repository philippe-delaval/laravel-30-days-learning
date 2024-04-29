<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    /** @test */
    public function home_page_loads_correctly()
    {
        // Request the home page
        $response = $this->get('/');

        // Assert the response status is 200 OK
        $response->assertStatus(200);

        // Assert the navigation links are present
        $response->assertSee('Home', false);
        $response->assertSee('Jobs', false);
        $response->assertSee('Contact', false);

        // Optionally, assert that the "Create Job" button is present
        // This might require custom logic based on how your Blade components are rendered
        $response->assertSee('Create Job', false);
    }
}
