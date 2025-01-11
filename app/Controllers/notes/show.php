<?php

use Core\App;
use Core\Database;

extract($_GET);

$db = App::resolve(Database::class);

$modules = $db->query(
    'SELECT m.*, i.stagiaire_id, n.note
        FROM modules m
        LEFT JOIN notes n ON m.module_id = n.module_id AND n.stagiaire_id = :stagiaire_id
        LEFT JOIN stagiaires s ON s.stagiaire_id = n.stagiaire_id
        LEFT JOIN filieres f ON f.filiere_id = m.filiere_id
        LEFT JOIN inscriptions i ON i.filiere_id = f.filiere_id
    WHERE m.filiere_id = :filiere_id
        AND i.stagiaire_id = :stagiaire_id',
    [
        ':stagiaire_id' => $stagiaire_id,
        ':filiere_id' => $filiere_id,
        ]
)->findAll();

// dd($modules);

view('notes/modals/notes/show.view.php', [
    'nom' => $nom,
    'prenom' => $prenom,
    'filiere_intitule' => $filiere_intitule,
    'annee_etude' => $annee_etude,
    'modules' => $modules,
]);
