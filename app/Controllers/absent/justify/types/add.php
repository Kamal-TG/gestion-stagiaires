<?php

use Core\App;
use Core\Database;


extract($_POST);

$db = App::resolve(Database::class);

$db->query(
    'INSERT INTO justifications_types
    VALUES (DEFAULT, :justification_type)',
    [
        ':justification_type' => $justification_type
    ]
);

redirect("/absent/create?filiere_id={$old_filiere_id}");

