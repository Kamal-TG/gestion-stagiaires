<?php

use Core\App;
use Core\Database;


extract($_GET);

$db = App::resolve(Database::class);

$justifications_types = $db->query(
    'SELECT *, justification_type_id AS id
        FROM justifications_types
    '
)->findAll();

view('/absent/modals/justify/create.view.php', [
    'nom' => $nom,
    'prenom' => $prenom,
    'filiere_intitule' => $filiere_intitule,
    'annee_etude' => $annee_etude,
    'justifications_types' => $justifications_types,
    'filiere_id' => $filiere_id,
    'stagiaire_id' => $stagiaire_id,
]);

