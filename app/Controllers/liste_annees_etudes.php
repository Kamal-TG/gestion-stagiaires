<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$annees_etudes = $db->query(
    'SELECT DISTINCT (annee_etude)
    FROM stagiaires
    ORDER BY annee_etude
    WHERE filiere in (:filieres)', [
        ':filieres' => $filieres
    ]
)->findAll();


view('list.view.php', [
    'annees_etudes' => $annees_etudes
]);
