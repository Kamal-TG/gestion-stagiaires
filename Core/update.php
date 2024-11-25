<?php
// Modifier information d'un student
use Core\App;
use Core\Database;
$db = App::resolve(Database::class);
$id =  $_POST['id'] ?? '' ;
$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$filiere = $_POST['filiere'] ?? '';
$anne_etude = $_POST['annee_etude'] ?? '';
$type_bac = $_POST['type_bac'] ?? '';
$annee_bac = $_POST['annee_bac'] ?? '';
$db->query('UPDATE stagiaires set nom=:nom, prenom=:prenom, filiere=:fil, annee_etude=:anneEtude, type_bac=:typeBac, anne_bac=:anneBac WHERE matricule=:mat'
,compact('nom', 'prenom', 'filiere', 'anne_etude','type_bac', 'annee_bac', 'id'));