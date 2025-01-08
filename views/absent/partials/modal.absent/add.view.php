<div>

    <h4><?= $nom ?> <?= $prenom ?></h4>
    <div class="row">
        <div class="col-auto">
            <p><strong>Filiere:</strong> <?= $filiere_intitule ?></p>
        </div>
        <div class="col-auto">
            <p><strong>Année d'étude:</strong> <?= $annee_etude ?></p>
        </div>
    </div>

    <input type="text" name="stagiaire_id" value="<?= $stagiaire_id ?>" required hidden>
    <input type="text" name="old_filiere_id" value="<?= $old_filiere_id ?>" required hidden>

    <div class="row">
        <div class="col-4">
            <label for="date_absence" class="col-form-label mb-3">Date absence</label>
            <label for="nombre_heures" class="col-form-label">Nombre heures</label>
        </div>

        <div class="col">
            <input class="form-control mb-3" type="date" id="date_absence" name="date_absence" value="<?= date('Y-m-d') ?>" max="<?= date('Y-m-d') ?>" required>
            <input class="form-control" type="number" id="nombre_heures" name="nombre_heures" min="1" max="10" required>
        </div>
    </div>

</div>