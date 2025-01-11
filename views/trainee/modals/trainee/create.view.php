<!-- Modal addTrainee -->
<div class="modal fade" id="addTrainee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addTraineeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/trainee/add" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addTraineeLabel">Ajouter Stagiaire</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-container">

                        <div class="mb-3 border-bottom">
                            <h6>Information Personnelles</h6>
                        </div>

                        <div class="mb-3 row">
                            <div class="col">
                                <input type="text" class="form-control" name="nom" id="nom" value="<?= $_POST['nom'] ?? '' ?>" placeholder="Nom" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="prenom" id="prenom" value="<?= $_POST['prenom'] ?? '' ?>" placeholder="Prénom" required>
                            </div>
                        </div>

                        <div class="mb-3 border-bottom">
                            <h6>Information Filiére</h6>
                        </div>

                        <div class="row justify-content-start">
                            <div class="col-auto w-50 mb-3">
                                <select class="form-select" name="filiere_id" required>
                                    <option hidden disabled selected value> -- Filiére -- </option>
                                    <?php foreach ($filieres ?? [] as $filiere) : ?>
                                        <option value="<?= $filiere['filiere_id'] ?>"><?= $filiere['intitule'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-auto w-50 mb-3">
                                <select class="form-select" name="annee_etude" id="annee_etude" required>
                                    <option hidden disabled selected value> -- Année Etude -- </option>
                                    <option value="1">1er année</option>
                                    <option value="2">2ème année</option>
                                    <option value="3">3ème année</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 border-bottom">
                            <h6>Information sur Baccalauréat</h6>
                        </div>

                        <div class="row justify-content-start">
                            <div class="col-auto mb-3">
                                <select class="form-control" name="baccalaureat_id" required>
                                    <option hidden disabled selected value> -- Série Baccalauréat -- </option>
                                    <?php foreach ($baccalaureats ?? [] as $baccalaureat) : ?>
                                        <option value="<?= $baccalaureat['baccalaureat_id'] ?>"><?= $baccalaureat['intitule'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="row col-auto mb-3">
                                <div class="col-auto">
                                    <label for="annee_baccalaureat" class="col-form-label">Date d'obtention :</label>
                                </div>
                                <div class="col-auto">
                                    <input type="date" class="form-control" name="annee_baccalaureat" id="annee_baccalaureat" value="<?= $_POST['annee_baccalaureat'] ?? '' ?>" required>
                                    <?php if (isset($errors['annee_baccalaureat'])): ?>
                                        <p class="text-danger fst-italic">
                                            <?= $errors['annee_baccalaureat'] ?>
                                        </p>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Send old selected major -->
                <?php if (isset($_GET['filiere_id'])) : ?>
                    <input type="text" name="filiere_id" value="<?= $_GET['filiere_id'] ?>" hidden>
                <?php endif ?>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>