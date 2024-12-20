<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

// stagiaire
$db->query(
    'INSERT INTO stagiaires
    VALUES (DEFAULT, :nom, :prenom)',
    [
        ':nom' => $_POST['nom'],
        ':prenom' => $_POST['prenom'],
    ]
);

$stagiaire_id = $db->lastInsertId();

// filiere
$db->query(
    'INSERT INTO inscriptions
    VALUES (:stagiaire_id, :annee_etude, :filiere_id)',
    [
        ':stagiaire_id' => $stagiaire_id,
        ':annee_etude' => $_POST['annee_etude'],
        ':filiere_id' => $_POST['filiere_id'],
    ]
);

// baccalaureat
$db->query(
    'INSERT INTO stagiaires_baccalaureats
    VALUES (:stagiaire_id, :annee_baccalaureat, :baccalaureat_id)',
    [
        ':stagiaire_id' => $stagiaire_id,
        ':annee_baccalaureat' => $_POST['annee_baccalaureat'],
        ':baccalaureat_id' => $_POST['baccalaureat_id'],
    ]
);

Session::flash('success', 'Satagiare a été ajoutée par succès.');

redirect('/trainee/create');
