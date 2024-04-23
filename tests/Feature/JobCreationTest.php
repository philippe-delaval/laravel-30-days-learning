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
}
