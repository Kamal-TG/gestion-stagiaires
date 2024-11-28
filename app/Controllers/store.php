<?php

use Core\App;
use Core\Database;

$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$filiere = $_POST['filiere'] ?? '';
$annee_etude = $_POST['annee_etude'] ?? '';
$type_bac = $_POST['type_bac'] ?? '';
$annee_bac = $_POST['annee_bac'] ?? '';

if (empty($nom) || empty($prenom) || empty($filiere) || empty($annee_etude) || empty($type_bac) || empty($annee_bac)) {
    $errors['general'] = 'Tous les champs sont obligatoires!';
    return view('create.view.php', [
        'heading' => 'Inscription Stagiaire',
        'errors' => $errors
    ]);
}

App::resolve(Database::class)->query(
    'INSERT INTO stagiaires VALUES(DEFAULT, :nom, :prenom, :filiere, :annee_etude, :type_bac, :annee_bac)',
    compact('nom', 'prenom', 'filiere', 'annee_etude', 'type_bac', 'annee_bac')
);

view('create.view.php', [
    'heading' => 'Inscription Stagiaire',
    'success' => 'Stagiaire été ajouté avec succès!'
]);
