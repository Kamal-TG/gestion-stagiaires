<!-- Update Trainee Information -->
<div>
    <!-- Title -->
    <h4><?= $nom . ' ' . $prenom ?></h4>

    <hr>

    <!-- Information Personnelle -->
    <input type="text" name="stagiaire_id" value="<?= $stagiaire_id ?>" hidden>
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-auto">
                    <label for="nom" class="col-form-label">Nom</label>
                </div>
                <div class="col">
                    <input class="form-control" type="text" id="nom" name="nom" value=<?= $nom ?>>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-auto">
                    <label for="prenom" class="col-form-label">Prénom</label>
                </div>
                <div class="col">
                    <input class="form-control" type="text" id="prenom" name="prenom" value=<?= $prenom ?>>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <!-- Information Filiére -->
    <input type="text" name="filiere_id" value="<?= $filiere_id ?>" hidden>
    <div class="row mb-3">
        <div class="col-auto">
            <label for="filiere_id" class="col-form-label">Filiére</label>
        </div>
        <div class="col">
            <select class="form-select" id="filiere_id" name="filiere_id">
                <option hidden disabled value> -- Selectionner un filiére -- </option>
                <?php foreach ($filieres as $filiere) : ?>
                    <option value="<?= $filiere['id'] ?>" <?= $filiere['intitule'] === $filiere_intitule ? 'selected' : '' ?>><?= $filiere['intitule'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-auto">
            <label for="annee_etude" class="col-form-label">Année d'étude</label>
        </div>
        <div class="col-auto">
            <select class="form-select" id="annee_etude" name="annee_etude" value=$annee_etude>
                <option hidden disabled value> -- Année Etude -- </option>
                <option value="1" <?= $annee_etude == 1 ? 'selected' : '' ?>>1er année</option>
                <option value="2" <?= $annee_etude == 2 ? 'selected' : '' ?>>2ème année</option>
                <option value="3" <?= $annee_etude == 3 ? 'selected' : '' ?>>3ème année</option>
            </select>
        </div>
    </div>

    <hr>

    <!-- Information Baccalauréat -->
    <div class="row mb-3">
        <div class="col-auto">
            <label for="baccalaureat_id" class="col-form-label">Baccalauréat</label>
        </div>
        <div class="col">
            <select class="form-select" id="baccalaureat_id" name="baccalaureat_id">
                <option hidden disabled value> -- Selectionner un baccalauréat -- </option>
                <?php foreach ($baccalaureats as $baccalaureat) : ?>
                    <option value="<?= $baccalaureat['id'] ?>" <?= $baccalaureat['intitule'] === $baccalaureat_intitule ? 'selected' : '' ?>><?= $baccalaureat['intitule'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-auto">
            <label for="annee_baccalaureat" class="col-form-label">Année d'obtention</label>
        </div>
        <div class="col-auto">
            <input type="date" class="form-control" id="annee_baccalaureat" name="annee_baccalaureat" value="<?= $annee_baccalaureat ?>">
        </div>
    </div>
    </form>
</div>