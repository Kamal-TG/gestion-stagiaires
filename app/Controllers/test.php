<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$stagiairesTotal = $db->query(
    'SELECT count(*) AS count
    FROM stagiaires'
)->find();

$stagiairesTotal = $stagiairesTotal['count'];

$filieres = $db->query(
    'SELECT filiere AS name, count(*) AS y
    FROM stagiaires
    GROUP BY filiere'
)->findAll();

$filieresTotal = array_sum(array_column($filieres, 'y'));

// calculate percentages
for ($i = 0; $i < count($filieres); $i++) { 
    $filieres[$i]['y'] *= 100 / $filieresTotal;
}

$filieres = json_encode($filieres);

view('index.view.php', [
    'heading' => 'Dashboard',
    'stagiairesTotal' => $stagiairesTotal,
    'filieresTotal' => $filieresTotal,
    'filieres' => $filieres,
]);
