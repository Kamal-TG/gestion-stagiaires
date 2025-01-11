<?php

use Core\App;
use Core\Database;
use Core\Session;

extract($_POST);

$db = App::resolve(Database::class);

foreach ($notes as $module_id => $note) {
    $db->query(
        'INSERT INTO notes
        VALUES (:stagiaire_id, :filiere_id, :module_id, :note)
        ON DUPLICATE KEY UPDATE note = :note',
        [
            ':stagiaire_id' => $stagiaire_id,
            ':filiere_id' => $filiere_id,
            ':module_id' => $module_id,
            ':note' => $note,
        ]
    );
}

Session::flash('success', 'Notes a été mise à jour avec succès.');

redirect("/notes/create?filiere_id={$filiere_id}");
