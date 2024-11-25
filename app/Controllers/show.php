<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$ids = $db->query('SELECT id FROM stagiaires ORDER BY id')->findAll();
$ids = array_column($ids, 'id');

$stagiaire = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stagiaire = $db->query('SELECT * FROM stagiaires WHERE id = :id', [
        ':id' => $_POST['id']
    ])->findOrFail();
}

view('show.view.php', [
    'heading' => 'Rechercher les information d\'un stagiaire',
    'ids' => $ids,
    'stagiaire' => $stagiaire
]);
