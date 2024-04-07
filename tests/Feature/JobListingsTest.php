<?php

it('displays job listings correctly', function () {
    // Préparation : Créer des données de test pour les emplois
    $employer = \App\Models\Employer::factory()->create(['name' => 'Test Employer']);
    $job = \App\Models\Job::factory()->create([
        'employer_id' => $employer->id,
        'title' => 'Test Job',
        'salary' => '50000',
    ]);

    // Action : Visiter la page des listes d'emplois
    $response = $this->get('/jobs');

    // Vérification : S'assurer que la page contient les informations de l'emploi créé
    $response->assertStatus(200);

    // Utiliser assertSeeText pour s'assurer que le texte est présent dans le corps de la réponse et non dans les attributs HTML
    $response->assertSeeText('Test Employer');
    $response->assertSeeText('Test Job');
    $response->assertSeeText('50000 per year');

    // Vérifier également que le lien vers le détail de l'emploi est correct
    $response->assertSee("/jobs/{$job->id}", false);
});
