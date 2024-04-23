<?php

namespace Tests\Feature;

use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class JobPostedTest extends TestCase
{
    /** @test */
    public function a_job_mail_is_sent()
    {
        Mail::fake();

        $job = Job::factory()->create();

        Mail::assertNothingSent();

        Mail::to('<EMAIL>')->send(new JobPosted($job));

        Mail::assertSent(JobPosted::class, function ($mail) use ($job) {
            return $mail->hasTo('<EMAIL>')
                && $mail->job->is($job);
        });
    }
}
