<?php

namespace Tests\Feature;

use App\Models\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexPageTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function job_listings_page_displays_correctly()
    {
        // Create a set of job listings
        $jobs = Job::factory()->count(5)->create();

        // Access the job listings page
        $response = $this->get('/jobs');

        // Assert the response status is 200 OK
        $response->assertStatus(200);

        // Assert that the page contains job titles and employer names for each job
        foreach ($jobs as $job) {
            $response->assertSee(e($job->title), false);
            $response->assertSee(e($job->employer->name), false);
        }
    }
}
