<?php

namespace App\Controllers;

use Core\App;

class StagiaireController
{
    public function show($id)
    {
        $db = App::resolve('database');

        $stagiaire = $db->query("SELECT * FROM stagiaires WHERE id = :id", [
            'id' => $id
        ])->findOrFail();

        return view('stagiaire/show.php', ['stagiaire' => $stagiaire]);
    }
}
