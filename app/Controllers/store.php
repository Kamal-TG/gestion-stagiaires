<?php

use Core\App;
use Core\Database;

$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$filiere = $_POST['filiere'] ?? '';
$anne_etude = $_POST['annee_etude'] ?? '';
$type_bac = $_POST['type_bac'] ?? '';
$annee_bac = $_POST['annee_bac'] ?? '';

App::resolve(Database::class)->query(
    "INSERT INTO stagiaires
    VALUES(DEFAULT, :nom, :prenom, :filiere, :annee_etude, :type_bac, :annee_bac)",
    compact('nom', 'prenom', 'filiere', 'anne_etude', 'type_bac', 'annee_bac')
);