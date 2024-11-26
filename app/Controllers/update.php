<?php

use Core\App;
use Core\Database;

$id =  $_POST['id'] ?? '' ;
$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$filiere = $_POST['filiere'] ?? '';
$anne_etude = $_POST['annee_etude'] ?? '';
$type_bac = $_POST['type_bac'] ?? '';
$annee_bac = $_POST['annee_bac'] ?? '';

App::resolve(Database::class)->query(
    'UPDATE stagiaires
    SET nom = :nom,
        prenom = :prenom,
        filiere = :filiere,
        annee_etude = :anne_etude,
        type_bac = :type_bac,
        annee_bac = :annee_bac
    WHERE id = :id',
    compact('nom', 'prenom', 'filiere', 'anne_etude','type_bac', 'annee_bac', 'id')
);

view('edit.view.php', [
    'success' => 'Stagiaire été modifié avec succés!'
]);
