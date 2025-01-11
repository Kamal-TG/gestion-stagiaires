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
        <div style="display: grid; grid-template-columns: 1fr min-content 1fr;">
            <div>
                <input type="date" class="form-control" name="date_debut" value="<?= date('Y-m-d') ?>" required>
            </div>
            <div>
                <label class="col-form-label px-2"><i class="bi bi-arrow-right text-center"></i></label>
            </div>
            <div>
                <input type="date" class="form-control" name="date_fin" value="<?= date('Y-m-d') ?>" required>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="justification" class="col-form-label">Type:</label>
        <select name="justification" id="justification" class="form-select" required>
            <option hidden disabled selected value></option>
            <?php foreach ($justifications_types as $justification_type) : ?>
                <option value="<?= $justification_type['type'] . '#' . $justification_type['id'] ?>"><?= $justification_type['type'] ?></option>
            <?php endforeach ?>
        </select>
        <!-- <button class="btn btn-primary" onclick="event.preventDefault();" data-bs-target="#addJustificationType" data-bs-toggle="modal">Open second modal</button> -->
    </div>

    <div class="mb-3">
        <label for="details" class="col-form-label">Details:</label>
        <textarea name="details" id="details" class="form-control" required></textarea>
    </div>

    <div class="row">
        <div class="col-auto">
            <label for="document" class="col-form-label" required>Document:</label>
        </div>
        <div class="col">
            <input type="file" class="form-control" id="document" name="document" accept="application/pdf" required>
        </div>
    </div>

    <input type="text" name="filiere_id" value="<?= $filiere_id ?>" required hidden>
    <input type="text" name="name" value="<?= $nom . '-' . $prenom ?>" required hidden>
    <input type="text" name="filiere_intitule" value="<?= $filiere_intitule ?>" required hidden>
    <input type="text" name="annee_etude" value="<?= $annee_etude ?>" required hidden>
    <input type="text" name="stagiaire_id" value="<?= $stagiaire_id ?>" required hidden>

</div>