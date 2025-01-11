<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

if (isset($_GET['filiere_id'])) {
    $stagiaires = $db->query(
        'SELECT s.*, i.annee_etude, f.intitule AS filiere_intitule, f.code AS filiere_code
            FROM stagiaires s
            INNER JOIN inscriptions i ON i.stagiaire_id = s.stagiaire_id
            INNER JOIN filieres f ON f.filiere_id = i.filiere_id
        WHERE f.filiere_id = :filiere_id',
        [
            ':filiere_id' => $_GET['filiere_id'] ?? '',
        ]
    )->findAll();
}

$filieres = $db->query(
    'SELECT filiere_id, intitule
        FROM filieres
    ORDER BY intitule'
)->findAll();

$justifications_types = $db->query(
    'SELECT type
        FROM justifications_types
    '
)->findAll();

$justifications_types = array_column($justifications_types, 'type');

view('absent/index.view.php', [
    'heading' => 'Gestion des abscenes',
    'stagiaires' => $stagiaires ?? null,
    'filieres' => $filieres,
    'success' => Session::get('success'),
    'errors' => Session::get('errors'),
    'justifications_types' => $justifications_types,
]);
