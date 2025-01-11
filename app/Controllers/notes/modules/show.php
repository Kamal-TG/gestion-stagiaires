<?php

use Core\App;
use Core\Database;

$modules = App::resolve(Database::class)->query(
    'SELECT *
            FROM modules
        WHERE filiere_id = :filiere_id 
        ORDER BY code',
    [
        ':filiere_id' => $_GET['filiere_id'] ?? '',
    ]
)->findAll();

echo json_encode($modules);
