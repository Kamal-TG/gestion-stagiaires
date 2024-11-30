<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$filieres = $db->query(
    'SELECT DISTINCT (filiere)
    FROM stagiaires
    ORDER BY filiere'
)->findAll();
$filieres = array_column($filieres, 'filiere');

view('absents/create.view.php', [
    'heading' => 'Gestion d\'absences',
    'filieres' => $filieres
]);
