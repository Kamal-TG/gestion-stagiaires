<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

if (isset($_GET['filiere_id'])) {
    $stagiaires = $db->query(
        'SELECT s.*, i.annee_etude, f.intitule AS filiere_intitule, f.code AS filiere_code, sb.annee_baccalaureat, b.intitule AS baccalaureat_intitule, b.code AS baccalaureat_code
            FROM stagiaires s
            INNER JOIN inscriptions i ON i.stagiaire_id = s.stagiaire_id
            INNER JOIN filieres f ON f.filiere_id = i.filiere_id
            INNER JOIN stagiaires_baccalaureats sb ON sb.stagiaire_id = s.stagiaire_id
            INNER JOIN baccalaureats b ON b.baccalaureat_id = sb.baccalaureat_id
        WHERE f.filiere_id like :filiere_id',
        [
            ':filiere_id' => '%' . ($_GET['filiere_id'] ?? '') . '%',
        ]
    )->findAll();
}

$filieres = $db->query(
    'SELECT filiere_id, intitule
        FROM filieres
    ORDER BY intitule'
)->findAll();

$baccalaureats = $db->query(
    'SELECT baccalaureat_id, intitule
        FROM baccalaureats
    ORDER BY intitule'
)->findAll();

view('trainee/index.view.php', [
    'heading' => 'Gestion des stagiaires',
    'stagiaires' => $stagiaires ?? null,
    'filieres' => $filieres,
    'baccalaureats' => $baccalaureats,
    'success' => Session::get('success'),
    'errors' => Session::get('errors'),
]);

