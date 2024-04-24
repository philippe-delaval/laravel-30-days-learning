<?php

use App\Models\Job;
use App\Models\User;
use App\Policies\JobPolicy;

test('user can edit their own job', function () {
    // Création d'un utilisateur et d'un job fictifs
    $user = User::factory()->create();
    $job = Job::factory()->create(['employer_id' => $user->id]);

    // Simulation de la relation employer->user pour le job
    $job->employer = (object) ['user' => $user];

    $policy = new JobPolicy();

    // Vérification si l'utilisateur peut éditer le job
    expect($policy->edit($user, $job))->toBeTrue();
});

test('user cannot edit a job they do not own', function () {
    // Création de deux utilisateurs et d'un job fictifs
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();
    $job = Job::factory()->create(['employer_id' => $user2->id]);

    // Simulation de la relation employer->user pour le job
    $job->employer = (object) ['user' => $user2];

    $policy = new JobPolicy();

    // Vérification si l'utilisateur 1 ne peut pas éditer le job de l'utilisateur 2
    expect($policy->edit($user1, $job))->toBeFalse();
});
