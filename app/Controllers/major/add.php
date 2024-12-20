<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$db->query(
    'INSERT INTO filieres
    VALUES (DEFAULT, :intitule, :code, :nombre_annees)',
    $_POST
);

Session::flash('success', 'Filière a été ajoutée par succès.');

redirect('/trainee/create');
