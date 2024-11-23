<?php
use Core\App;
use Core\Database;
// Consultation de donnees d'un stagaire
$db = App::resolve(Database::class);
$filiaire = $_POST['filiere']?? '';
$annee_etude = $_POST['annee_etude']?? '';
$db->query('SELECT * INTO stagiaires WHERE filiere=:filiere And annee_etude=:annee_etude', compact('filiaire', 'annee_etude')).findAll();







 
