<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$stagiaires = $db->query('SELECT * FROM stagiaires WHERE filiere = :filiere AND annee_etude = :annee_etude', [
    ':filiere' => $_POST['filiere'],
    ':annee_etude' => $_POST['annee_etude']
])->findAll();

view('list.view.php', [
    'stagiaires' => $stagiaires
]);
