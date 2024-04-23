<?php

namespace Tests\Feature;

use App\Models\Job;
use Tests\TestCase;

class JobControllerTest extends TestCase
{
    /** @test */
    public function index_shows_jobs()
    {
        // Arrange: Create some jobs
        $jobs = Job::factory()->count(5)->create();

        // Act: Visit the index route
        $response = $this->get('/jobs');

        // Assert: See jobs on the page
        $response->assertStatus(200);
        foreach ($jobs as $job) {
            $response->assertSee(e($job->title), false);
        }
    }
}
