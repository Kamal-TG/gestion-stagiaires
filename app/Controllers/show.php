<?php

use Core\App;
use Core\Database;

$stagiaire = App::resolve('database')->query(
    'SELECT * FROM stagiaires WHERE id = :id', [
        'id' => $_POST['id']
    ]
)->findOrFail();

view('show.view.php', [
    'stagiaire' => $stagiaire
]);
