<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$db->query(
    'UPDATE stagiaires
    SET nom = :nom,
        prenom = :prenom
    WHERE stagiaire_id = :stagiaire_id',
    [
        ':nom' => $_POST['nom'],
        ':prenom' => $_POST['prenom'],
        ':stagiaire_id' => $_POST['stagiaire_id'],
    ]
);

$db->query(
    'UPDATE inscriptions
        SET filiere_id = :filiere_id,
            annee_etude = :annee_etude
    WHERE stagiaire_id = :stagiaire_id',
    [
        ':filiere_id' => $_POST['filiere_id'],
        ':annee_etude' => $_POST['annee_etude'],
        ':stagiaire_id' => $_POST['stagiaire_id'],
    ]
);

$db->query(
    'UPDATE stagiaires_baccalaureats
        SET baccalaureat_id = :baccalaureat_id,
            annee_baccalaureat = :annee_baccalaureat
    WHERE stagiaire_id = :stagiaire_id',
    [
        ':baccalaureat_id' => $_POST['baccalaureat_id'],
        ':annee_baccalaureat' => $_POST['annee_baccalaureat'],
        ':stagiaire_id' => $_POST['stagiaire_id'],
    ]
);

Session::flash('success', 'Stagiaire a été modifié par succès.');

redirect("/trainee/create?filiere_id={$_POST['filiere_id']}");
