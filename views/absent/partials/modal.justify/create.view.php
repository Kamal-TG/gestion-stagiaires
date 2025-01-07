<div>
    <header class="mb-3">
        <h4><?= $nom ?> <?= $prenom ?></h4>
        <div class="row">
            <div class="col-auto">
                <p><strong>Filiere:</strong> <?= $filiere_intitule ?></p>
            </div>
            <div class="col-auto">
                <p><strong>Année d'étude:</strong> <?= $annee_etude ?></p>
            </div>
        </div>
    </header>

    <div class="mb-3">
        <label for="date_debut" class="form-label">Duration:</label>
        <div class="row">
            <div class="col-auto">
                <input type="date" class="form-control" name="date_debut">
            </div>
            <div class="col-1">
                <label class="col-form-label"><i class="bi bi-arrow-right fw-bolder"></i></label>
            </div>
            <div class="col-auto">
                <input type="date" class="form-control" name="date_fin">
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="justifications_types" class="col-form-label">Type:</label>
        <select name="justification_type" id="justification_type" class="form-select">
            <option hidden disabled selected value></option>
            <?php foreach ($justifications_types as $justification_type) : ?>
                <option value="<?= $justification_type['id'] ?>"><?= $justification_type['type'] ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="details" class="col-form-label">Details:</label>
        <textarea name="details" id="details" class="form-control"></textarea>
    </div>

    <div class="row">
        <div class="col-auto">
            <label for="document" class="col-form-label">Document:</label>
        </div>
        <div class="col">
            <input type="file" class="form-control" id="document" name="document" accept="application/pdf">
        </div>
    </div>

    <input type="text" name="old_filiere_id" value="<?= $old_filiere_id ?>" hidden>

</div>