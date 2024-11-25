<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$filieres = $db->query(
    'SELECT DISTINCT (filiere)
    FROM stagiaires
    ORDER BY filiere'
)->findAll();

view('list.view.php', [
    'filieres' => $filieres
]);
