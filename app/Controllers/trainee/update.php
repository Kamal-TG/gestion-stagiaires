<?php

use Core\App;
use Core\Database;


extract($_GET);
$nom ??= 'Inconnue';
$prenom ??= 'Inconnue';
$filiere_intitule ??= 'Inconnue';
$filiere_code ??= 'Inconnue';
$annee_etude ??= 'Inconnue';
$baccalaureat_intitule ??= 'Inconnue';
$baccalaureat_code ??= 'Inconnue';
$annee_baccalaureat ??= 'Inconnue';

$db = App::resolve(Database::class);

$filieres = $db->query(
    'SELECT filiere_id as id, intitule
        FROM filieres
    ORDER BY intitule'
)->findAll();

$baccalaureats = $db->query(
    'SELECT baccalaureat_id as id, intitule
        FROM baccalaureats
    ORDER BY intitule'
)->findAll();

view('/trainee/modals/trainee/update.view.php', [
    'stagiaire_id' => $stagiaire_id,
    'nom' => $nom,
    'prenom' => $prenom,
    'filiere_intitule' => $filiere_intitule,
    'filiere_code' => $filiere_code,
    'annee_etude' => $annee_etude,
    'baccalaureat_intitule' => $baccalaureat_intitule,
    'baccalaureat_code' => $baccalaureat_code,
    'annee_baccalaureat' => $annee_baccalaureat,
    'filieres' => $filieres,
    'baccalaureats' => $baccalaureats,
    'filiere_id' => $filiere_id,
]);
