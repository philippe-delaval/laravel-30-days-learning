<?php

use App\Models\Employer;
use App\Models\Job;

it('filters job listings by salary correctly', function () {
    // Préparation : Créer des données de test pour les emplois avec différents salaires
    $employer = Employer::factory()->create(['name' => 'High Paying Employer']);
    $highPayingJob = Job::factory()->create([
        'employer_id' => $employer->id,
        'title' => 'High Paying Job',
        'salary' => '100000', // Salaire élevé
    ]);

    $employerLow = Employer::factory()->create(['name' => 'Low Paying Employer']);
    $lowPayingJob = Job::factory()->create([
        'employer_id' => $employerLow->id,
        'title' => 'Low Paying Job',
        'salary' => '30000', // Salaire bas
    ]);

    // Action : Visiter la page des listes d'emplois avec un filtre de salaire
    $response = $this->get('/jobs?min_salary=50000');

    // Vérification : S'assurer que la page contient uniquement les informations de l'emploi bien payé
    $response->assertStatus(200);
    $response->assertSeeText('High Paying Employer');
    $response->assertSeeText('High Paying Job');
    $response->assertSeeText('100000 per year');

    // S'assurer que l'emploi au salaire bas n'est pas affiché
    $response->assertDontSeeText('Low Paying Employer');
    $response->assertDontSeeText('Low Paying Job');
    $response->assertDontSeeText('30000 per year');
});
