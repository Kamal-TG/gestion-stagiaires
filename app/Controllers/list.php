<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filiere = $_POST['filiere'];

    $annees_etudes = $db->query(
        'SELECT DISTINCT (annee_etude)
        FROM stagiaires
        WHERE filiere = :filiere
        ORDER BY annee_etude', [
            ':filiere' => $filiere
        ]
    )->findAll();
    $annees_etudes = array_column($annees_etudes, 'annee_etude');
    
    echo json_encode($annees_etudes);
    exit();
}

$filieres = $db->query(
    'SELECT DISTINCT (filiere)
    FROM stagiaires
    ORDER BY filiere'
)->findAll();

return view('list.view.php', [
    'heading' => 'Lister par filiére',
    'filieres' => $filieres
]);
