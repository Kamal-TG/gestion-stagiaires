<?php

use Core\App;
use Core\Database;
use Core\Session;


function getDateFormat($date, $format = 'Y.m.d') {
    return (new DateTime($date))->format($format);
}

extract($_POST);

// justification = name#id
[$justification_name, $justification_id] = explode('#', $justification);;

function errorRedirect($msg, $filiere_id) {
    Session::flash('errors', ['general' => $msg]);
    redirect("/absent/create?filiere_id={$filiere_id}");
}

if ((new DateTime($date_debut)) > (new DateTime($date_fin))) {
    errorRedirect('Date fin doit supérieur de date fin!', $filiere_id);
}

if (empty($_FILES)) {
    errorRedirect('$_FILES is empty - is file_uploads enabled in php.ini?', $filiere_id);
}

if ($_FILES['document']['size'] > 1_048_576) {
    errorRedirect('File too large (max 1MB)', $filiere_id);
}

$mime_types = ['application/pdf'];
if (!in_array($_FILES['document']['type'], $mime_types)) {
    errorRedirect('Invalid file type', $filiere_id);
}

$pathinfo = pathinfo($_FILES['document']['name']);

$filename = str_replace(
    ' ',
    '-',
    join(
        '_',
        [
            (getDateFormat($date_debut) . '-' . getDateFormat($date_fin)),
            $justification_name,
            $name,
            $filiere_intitule,
            $annee_etude
        ]
    )
) . '.pdf';

$destination =
    BASE_PATH . DIRECTORY_SEPARATOR
    . 'uploads' . DIRECTORY_SEPARATOR
    . 'justifications' . DIRECTORY_SEPARATOR
    . $filename
;

$i = 1;

while (file_exists($destination)) {
    $filename = "$base({$i}).{$pathinfo['extension']}";
    $destination = BASE_PATH . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $filename;
    $i++;
}

if (! move_uploaded_file($_FILES['document']['tmp_name'], $destination)) {
    errorRedirect('Can\'t move uploaded file', $filiere_id);
}

$document = $destination;

$db = App::resolve(Database::class);

// insert justification
$justification_id = $db->query(
    'INSERT INTO justifications
    VALUES (DEFAULT, :stagiaire_id, :date_debut, :date_fin, :details, :document, :justification_id)',
    [
        'stagiaire_id' => $stagiaire_id,
        ':date_debut' => $date_debut,
        ':date_fin' => $date_fin,
        ':details' => $details,
        ':document' => $document,
        ':justification_id' => $justification_id,
    ]
)->lastInsertId();

$db->query(
    'UPDATE absences
        SET justifie = TRUE,
            justification_id = :justification_id
    WHERE stagiaire_id = :stagiaire_id
        AND date_absence BETWEEN :date_debut AND :date_fin
    ',
    [
        ':justification_id' => $justification_id,
        ':stagiaire_id' => $stagiaire_id,
        ':date_debut' => $date_debut,
        ':date_fin' => $date_fin,
    ]
);

Session::flash('success', 'Justification a été ajoutée avec succès.');

redirect("/absent/create?filiere_id={$filiere_id}");
