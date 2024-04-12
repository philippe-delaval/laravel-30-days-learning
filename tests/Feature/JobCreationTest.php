<?php

namespace Tests\Feature;

use Tests\TestCase;

class JobCreationTest extends TestCase
{
    /** @test */
    public function the_job_creation_page_is_accessible()
    {
        $response = $this->get('/jobs/create');
        $response->assertStatus(200);
        $response->assertSee('Create Job');
    }

    /** @test */
    public function a_user_can_create_a_job()
    {
        $formData = [
            'title' => 'Test Job',
            'salary' => '$50,000 Per Year',
        ];

        $response = $this->post('/jobs', $formData);

        // Mettez à jour cette ligne pour refléter l'URL de redirection attendue
        $response->assertRedirect('/jobs');
        $this->assertDatabaseHas('jobs', $formData);
    }

    /** @test */
    public function a_job_requires_a_title_and_salary()
    {
        $response = $this->post('/jobs', [
            'title' => '',
            'salary' => '',
        ]);

        $response->assertSessionHasErrors(['title', 'salary']);
    }
}
