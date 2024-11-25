<?php
// Affichage L'information des stagaire par annee d'etude et par filiere
use Core\App;
use Core\Database;
$db = App::resolve(Database::class);
$filiaire = $_POST['filiere']?? '';
$annee_etude = $_POST['annee_etude']?? '';
$db->query('SELECT * FROM stagiaires WHERE filiere=:filiere And annee_etude=:annee_etude', compact('filiaire', 'annee_etude'))->findAll();







 
