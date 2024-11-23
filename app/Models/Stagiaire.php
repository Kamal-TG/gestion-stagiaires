<?php

namespace App\Models;

use Core\App;
use Core\Database;

class Stagiaire
{
    public function __construct(private array $attributes)
    {
    }

    public function exist()
    {
        // check if stagiaire already exists (by nom, prenom)
        return App::resolve(Database::class)->query('SELECT * FROM stagiaires WHERE nom = :nom OR prenom = :prenom', [
            ':nom' => $this->attributes['nom'],
            ':prenom' => $this->attributes['prenom'],
        ])->find();
    }

    public function save()
    {
        App::resolve(Database::class)->query(
            'INSERT INTO stagiaires 
            VALUES(null, :nom, :prenom, :filiere, :annee_etude, :type_bac, :annee_bac)',
            $this->attributes
        );
    }

    public function update($old_nom, $old_prenom)
    {
        App::resolve(Database::class)->query(
            'UPDATE stagiaires
            SET nom = :nom, prenom = :prenom, genre = :genre, cin = :cin, cne = :cne, email = :email, date_naissance = :daten, lieu_naissance = :lieun, phone = :phone, niveau = :niveau, filiere = :filiere, groupe = :groupe
            WHERE nom = :old_nom AND prenom = :old_prenom',
            array_merge(
                $this->attributes,
                [
                    ':old_nom' => $old_nom,
                    ':old_prenom' => $old_prenom,
                ]
            )
        );
    }
}
