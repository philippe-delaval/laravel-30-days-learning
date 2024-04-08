<?php

namespace Tests\Feature;

use Tests\TestCase;

class WebRoutesTest extends TestCase
{
    /** @test */
    public function the_home_page_is_accessible()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /** @test */
    public function the_jobs_page_is_accessible()
    {
        $response = $this->get('/jobs');
        $response->assertStatus(200);
        // Vous pouvez ajouter plus d'assertions ici pour vérifier le contenu de la page
    }

    /** @test */
    public function a_specific_job_page_is_accessible()
    {
        // Vous devrez créer un job dans la base de données pour tester cette route
        $job = \App\Models\Job::factory()->create();
        $response = $this->get("/jobs/{$job->id}");
        $response->assertStatus(200);
        // Note: Commentez ou adaptez ce test selon votre configuration de base de données et factories
    }

    /** @test */
    public function the_contact_page_is_accessible()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
    }
}
