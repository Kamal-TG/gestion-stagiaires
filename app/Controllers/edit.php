<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$stagiaire = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stagiaire = $db->query('SELECT * FROM stagiaires WHERE id = :id', [
        ':id' => $_POST['old_id']
    ])->findOrFail();
}

$ids = $db->query('SELECT id FROM stagiaires ORDER BY id')->findAll();
$ids = array_column($ids, 'id');

view('edit.view.php', [
    'ids' => $ids,
    'stagiaire' => $stagiaire
]);
