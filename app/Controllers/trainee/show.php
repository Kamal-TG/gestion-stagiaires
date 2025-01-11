<?php

extract($_GET);
$nom ??= 'Inconnue';
$prenom ??= 'Inconnue';
$filiere_intitule ??= 'Inconnue';
$filiere_code ??= 'Inconnue';
$annee_etude ??= 'Inconnue';
$baccalaureat_intitule ??= 'Inconnue';
$baccalaureat_code ??= 'Inconnue';
$annee_baccalaureat ??= 'Inconnue';

view('trainee/modals/trainee/show.view.php', [
    'nom' => $nom,
    'prenom' => $prenom,
    'filiere_intitule' => $filiere_intitule,
    'filiere_code' => $filiere_code,
    'annee_etude' => $annee_etude,
    'baccalaureat_intitule' => $baccalaureat_intitule,
    'baccalaureat_code' => $baccalaureat_code,
    'annee_baccalaureat' => $annee_baccalaureat,
]);
