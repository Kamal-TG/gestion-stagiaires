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

echo <<<HTML
    <h4>$nom $prenom</h4>
    <p><strong>Nom:</strong> $nom</p>
    <p><strong>Prenom:</strong> $prenom</p>
    <p><strong>Filiere:</strong> $filiere_intitule ($filiere_code)</p>
    <p><strong>Année d'étude:</strong> $annee_etude</p>
    <p><strong>Baccalaureat:</strong> $baccalaureat_intitule ($baccalaureat_code)</p>
    <p><strong>Année d'obtention de baccalaureat:</strong> $annee_baccalaureat</p>
HTML;
