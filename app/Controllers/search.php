<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$filieres = $db->query(
    'SELECT DISTINCT (filiere)
    FROM stagiaires
    ORDER BY filiere'
)->findAll();

$stagiaires = $db->query(
    'SELECT *
    FROM stagiaires
    WHERE filiere = :filiere
        AND annee_etude = :annee_etude', [
    ':filiere' => $_GET['filiere'],
    ':annee_etude' => $_GET['annee_etude']
])->findAll();

view('list.view.php', [
    'heading' => 'Lister par filiére',
    'stagiaires' => $stagiaires,
    'filieres' => $filieres
]);
