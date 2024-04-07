<?php

it('job details are displayed correctly', function () {
    // Création d'un emploi de test dans la base de données
    $job = \App\Models\Job::factory()->create([
        'title' => 'Senior Laravel Developer',
        'salary' => '80000',
    ]);

    // Visite de la page de détail de l'emploi
    $response = $this->get("/jobs/{$job->id}");

    // Vérification que la page affiche correctement les détails de l'emploi
    $response->assertStatus(200);
    $response->assertSee('Senior Laravel Developer');
    $response->assertSee('This job pays 80000 per year.');
});
