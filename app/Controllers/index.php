<?php

use Core\App;
use Core\Database;


$db = App::resolve(Database::class);

$stagiairesCount = $db->query(
    'SELECT count(*) AS count
        FROM stagiaires'
)->findOrFail();

$stagiairesCount = $stagiairesCount['count'];

$filieres = $db->query(
    'SELECT intitule AS name, count(i.stagiaire_id) AS y
        FROM filieres f
        LEFT JOIN inscriptions i ON f.filiere_id = i.filiere_id
    GROUP BY f.filiere_id'
)->findAll();

$filieresCount = count($filieres);

// calculate percentages
if ($filieresCount > 0) {
    for ($i = 0; $i < count($filieres); $i++) { 
        $filieres[$i]['y'] *= 100 / $filieresCount;
    }
}

$filieres = json_encode($filieres);

view('index.view.php', [
    'heading' => 'Tableau de bord',
    'stagiairesCount' => $stagiairesCount,
    'filieresCount' => $filieresCount,
    'filieres' => $filieres,
]);
