<?php

use Core\App;
use Core\Database;
use Core\Session;

if (isset($_POST['stagiaire_id']) && isset($_POST['date_absence']) && isset($_POST['nombre_heures'])) {
    $db = App::resolve(Database::class);

    // check if already added
    $absence_id = $db->query(
        'SELECT absence_id
            FROM absences
        WHERE date_absence = :date_absence
            AND stagiaire_id = :stagiaire_id',
        [
            ':stagiaire_id' => $_POST['stagiaire_id'],
            ':date_absence' => $_POST['date_absence'],
        ]
    )->find();

    if ($absence_id) {
        $db->query(
            'UPDATE absences
                SET nombre_heures = nombre_heures + :nombre_heures
            WHERE stagiaire_id = :stagiaire_id',
            [
                ':stagiaire_id' => $_POST['stagiaire_id'],
                ':nombre_heures' => $_POST['nombre_heures'],
            ]
        );
    }
    else {

        // if this absent already justified get the justification_id
        $justification_id = $db->query(
            'SELECT justification_id
                FROM justifications
            WHERE stagiaire_id = :stagiaire_id
                AND :date_absence BETWEEN date_debut AND date_fin
            ',
            [
                ':stagiaire_id' => $_POST['stagiaire_id'],
                ':date_absence' => $_POST['date_absence'],
            ]
        )->find()['justification_id'];
        
        // make the absent justified
        $justifie = $justification_id !== false;
        $justification_id = $justification_id ?: 'DEFAULT';

        // insert the absent
        $db->query(
            "INSERT INTO absences
            VALUES (DEFAULT, :stagiaire_id, :date_absence, :nombre_heures, :justifie, {$justification_id})",
            [
                ':stagiaire_id' => $_POST['stagiaire_id'],
                ':date_absence' => $_POST['date_absence'],
                ':nombre_heures' => $_POST['nombre_heures'],
                ':justifie' => $justifie,
                // ':justification_id' => $justification_id,
            ]
        );
    }

    Session::flash('success', 'Absence a été ajoutée avec succès.');

    redirect("/absent/create?filiere_id={$_POST['old_filiere_id']}");
}

view('/absent/partials/modal.absent/add.view.php', [
    'stagiaire_id' => $_GET['stagiaire_id'],
    'old_filiere_id' => $_GET['old_filiere_id'],
    'nom' => $_GET['nom'],
    'prenom' => $_GET['prenom'],
    'filiere_intitule' => $_GET['filiere_intitule'],
    'annee_etude' => $_GET['annee_etude'],
]);
