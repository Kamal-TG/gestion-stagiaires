<?php

extract($_GET);

view('trainee/partials/modal.trainee/show.view.php', [
    'nom' => $nom,
    'prenom' => $prenom,
    'filiere_intitule' => $filiere_intitule,
    'filiere_code' => $filiere_code,
    'annee_etude' => $annee_etude,
    'baccalaureat_intitule' => $baccalaureat_intitule,
    'baccalaureat_code' => $baccalaureat_code,
    'annee_baccalaureat' => $annee_baccalaureat,
]);
view('trainee/partials/modal.trainee/delete.view.php', [
    'stagiaire_id' => $stagiaire_id,
    'filiere_id' => $filiere_id,
]);
