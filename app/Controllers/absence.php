<?php
// Ajouter Dans le tableau des Absence
use Core\App;
use Core\Database;
$nombre_heures = $_POST['nombre_heures'] ?? '' ;
$date_absence = $_POST['date_absence'] ?? '' ;
$justifie = $_POST['justifie'] ?? '';
$id_stagaire = $_POST['id_stagaire'] ?? '' ;

if (empty($nombre_heures) || empty($date_absence) || empty($justifie) || empty($id_stagaire) ) {
    $errors['general'] = 'Tous les champs sont obligatoires!';
    return view('absence.view.php', [
        'errors' => $errors
    ]);
}
// dd($_POST['form2']);
$justifie = $_POST['justifie']=='Oui'? true : false ;
App::resolve(Database::class)->query(
    'INSERT INTO absences Values(Default,:nombre_heures, :date_absence, :justifie, :id_stagiaire)',
    [
        ':nombre_heures' => $nombre_heures,
        ':date_absence' => $date_absence,
        ':justifie' => $justifie,
        ':id_stagiaire' => $id_stagaire
    ]
);

view('absence.view.php', [
    'success' => 'L\'absence d\'un Stagiaire été ajouté avec succès!'
]);
?>