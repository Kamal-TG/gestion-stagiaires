<?php

use Core\App;
use Core\Database;
use Core\Session;

if (isset($_POST['stagiaire_id'])) {    
    $db = App::resolve(Database::class);
    
    $db->query(
        'DELETE FROM stagiaires
            WHERE stagiaire_id = :stagiaire_id',
        [
            ':stagiaire_id' => $_POST['stagiaire_id']
        ]
    );
}

Session::flash('errors', [
    'general' => 'Stagiaire a été supprimée par succès.'
]);

redirect("/trainee/create?filiere_id={$_POST['filiere_id']}");
