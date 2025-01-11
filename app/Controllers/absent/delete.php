<?php

use Core\App;
use Core\Database;
use Core\Session;

// TODO: change to POST

extract($_GET);

if (! isset($absence_id)) {
    Session::flash('errors', [
        'general' => 'Something went wrong.',
    ]);
    redirect("/absent/create");
}

$db = App::resolve(Database::class);

$db->query(
    'DELETE
        FROM absences
    WHERE absence_id = :absence_id',
    [
        ':absence_id' => $absence_id,
    ]
);

Session::flash('success', 'Absence a été supprimée avec succès.');

if (! isset($filiere_id)) {
    redirect("/absent/create");
}

redirect("/absent/create?filiere_id={$filiere_id}");
