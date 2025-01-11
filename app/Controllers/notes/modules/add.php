<?php

use Core\App;
use Core\Database;
use Core\Session;

extract($_POST);

$db = App::resolve(Database::class);

$db->query(
    'INSERT INTO modules
    VALUES (DEFAULT, :intitule, :code, :coefficient, :filiere_id)',
    [
        ':intitule' => $intitule,
        ':code' => $code,
        ':coefficient' => $coefficient,
        ':filiere_id' => $select_filiere_id,
    ]
);

Session::flash('success', 'Module a été ajouté avec succès.');

redirect("/notes/create?filiere_id={$old_filiere_id}");
