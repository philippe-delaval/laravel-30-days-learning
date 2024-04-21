<?php

namespace Tests\Feature;

use App\Models\Job;
use App\Models\User;
use Tests\TestCase;

class JobControllerTest extends TestCase
{
    /** @test */
    public function index_displays_jobs()
    {
        // Arrange: Create some jobs in the database
        $user = User::factory()->create(); // Assuming you have a User factory for the employer
        $jobs = Job::factory()->count(5)->create(['employer_id' => $user->id]);

        // Act: Make a GET request to the index route
        $response = $this->get('/jobs');

        // Assert: Check if the view was called with the correct data
        $response->assertStatus(200); // Check if the HTTP status is 200
        $response->assertViewIs('jobs.index'); // Check if the correct view is returned
        $response->assertViewHas('jobs', $jobs); // Ensure jobs data is passed to the view correctly
    }
}
