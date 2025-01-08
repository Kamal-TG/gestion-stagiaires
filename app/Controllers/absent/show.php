<?php

use Core\App;
use Core\Database;

extract($_GET);

$db = App::resolve(Database::class);

$absences = $db->query(
    'SELECT *
        FROM absences a
        LEFT JOIN justifications j ON a.justification_id = j.justification_id
        LEFT JOIN justifications_types jt ON j.justification_type_id = jt.justification_type_id
    WHERE a.stagiaire_id = :stagiaire_id',
    [
        ':stagiaire_id' => $stagiaire_id,
    ]
)->findAll();

view('absent/partials/modal.absent/show.view.php', [
    'nom' => $nom,
    'prenom' => $prenom,
    'filiere_intitule' => $filiere_intitule,
    'annee_etude' => $annee_etude,
    'absences' => $absences,
]);


