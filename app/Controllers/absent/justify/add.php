<?php

use Core\App;
use Core\Database;
use Core\Session;

extract($_POST);

function errorRedirect($msg) {
    Session::flash('errors', [
        'general' => $msg
    ]);
    redirect("/absent/create?filiere_id={$old_filiere_id}");
}

if (empty($_FILES)) {
    errorRedirect('$_FILES is empty - is file_uploads enabled in php.ini?');
}

if ($_FILES['document']['size'] > 1_048_576) {
    errorRedirect('File too large (max 1MB)');
}

$mime_types = ['application/pdf'];
if (!in_array($_FILES['document']['type'], $mime_types)) {
    errorRedirect('Invalid file type');
}

$pathinfo = pathinfo($_FILES['document']['name']);

// remove forbidden characters
$base = $pathinfo['filename'];
$base = preg_replace('/[^\w-]/', '_', $base);

$filename = $base . '.' . $pathinfo['extension'];
$destination = BASE_PATH . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $filename;

$i = 1;

while (file_exists($destination)) {
    $filename = "$base({$i}).{$pathinfo['extension']}";
    $destination = BASE_PATH . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $filename;
    $i++;
}

if (! move_uploaded_file($_FILES['document']['tmp_name'], $destination)) {
    errorRedirect('Can\'t move uploaded file');
}

$document = $destination;

$db = App::resolve(Database::class);
$db->query(
    'INSERT INTO justifications
    VALUES (DEFAULT, :date_debut, :date_fin, :details, :document, :justification_type)',
    [
        ':date_debut' => $date_debut,
        ':date_fin' => $date_fin,
        ':details' => $details,
        ':document' => $document,
        ':justification_type' => $justification_type,
    ]
);

Session::flash('success', 'Justification a été ajoutée avec succès.');

redirect("/absent/create?filiere_id={$old_filiere_id}");
