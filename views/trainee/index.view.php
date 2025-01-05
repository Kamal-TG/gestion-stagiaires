<?php require_once base_path('views/partials/head.view.php'); ?>
<?php require_once base_path('views/partials/sidebar.view.php'); ?>
<?php require_once base_path('views/partials/topbar.view.php'); ?>
<?php require_once base_path('views/partials/heading.view.php'); ?>

<form class="mb-4" autocomplete="off" action="/trainee/create" method="GET">

    <!-- Show error message -->
    <?php if (isset($errors['general'])): ?>
        <div class="notification alert alert-danger" role="alert">
            <?= $errors['general'] ?>
        </div>
    <?php endif ?>

    <!-- Show success message -->
    <?php if (isset($success)): ?>
        <div class="notification alert alert-success" role="alert">
            <?= $success ?>
        </div>
    <?php endif ?>

    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="filiere_id" class="col-form-label">Filiére</label>
        </div>
        <div class="col-auto">
            <select class="form-select" id="filiere_id" name="filiere_id">
                <option hidden disabled selected value> -- Selectionner un filiére -- </option>
                <?php foreach ($filieres ?? [] as $filiere) : ?>
                    <option value="<?= $filiere['filiere_id'] ?>" <?= (int)($_GET['filiere_id'] ?? 0) === $filiere['filiere_id'] ? 'selected' : '' ?>><?= $filiere['intitule'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <!-- <div class="col-auto">
            <select class="form-select" name="annee_etude">
                <option hidden disabled selected value> -- Année Etude -- </option>
                <option value="1">1er année</option>
                <option value="2">2ème année</option>
                <option value="3">3ème année</option>
            </select>
        </div> -->
        <div class="col-auto">
            <button class="btn btn-primary">Récupérer</button>
        </div>
    </div>
</form>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Table de données des stagiaires</h6>
    </div>

    <form>
        <div class="filters row my-1 mx-2">
            <p class="text-muted mb-1">Filteres</p>
            <div class="col-3">
                <input type="text" class="form-control" id="name" placeholder="Nom/Prénom">
            </div>
            <div class="col-2">
                <select class="form-select" id="annee_etude">
                    <option selected value="">Tous Années Études</option>
                </select>
            </div>
            <div class="col-4">
                <select class="form-select" id="code_bac">
                    <option selected value="">Tous Series Bac</option>
                </select>
            </div>
            <div class="col-2">
                <input class="form-control" type="text" pattern="\d*" maxlength="4" id="annee_bac" placeholder="Année Bac">
            </div>
            <div class="col-1">
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </div>
    </form>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Filiére</th>
                        <th>Année Étude</th>
                        <th>Bac</th>
                        <th>Année Bac</th>
                        <th>Consulter</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($stagiaires) && !empty($stagiaires)) : ?>
                        <?php foreach ($stagiaires as $index => $stagiaire) : ?>
                            <?php extract($stagiaire) ?>
                            <tr>
                                <td class="align-middle"><?= $stagiaire_id ?></td>
                                <td class="align-middle"><?= $nom ?></td>
                                <td class="align-middle"><?= $prenom ?></td>
                                <td class="align-middle" title="<?= $filiere_intitule ?>"><?= $filiere_code ?></td>
                                <td class="align-middle"><?= $annee_etude . ($annee_etude > 1 ? 'éme' : 'er') ?></td>
                                <td class="align-middle" title="<?= $baccalaureat_intitule ?>"><?= $baccalaureat_code ?></td>
                                <td class="align-middle"><?= explode('-', $annee_baccalaureat)[0] ?></td>
                                <td>
                                    <a
                                        href="/trainee/show?<?= http_build_query($stagiaire) ?>"
                                        class="send-idx change-url btn btn-secondary btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#showTrainee">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                </td>
                                <td>
                                    <a
                                        href="/trainee/update?old_filiere_id=<?= $_GET['filiere_id'] ?? null ?>&<?= http_build_query($stagiaire) ?>"
                                        class="send-idx change-url btn btn-warning btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#updateTrainee">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <a
                                        href="/trainee/delete?filiere_id=<?= $_GET['filiere_id'] ?? null ?>&<?= http_build_query($stagiaire) ?>"
                                        class="send-idx change-url btn btn-danger btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteTrainee">
                                        <i class="bi bi-trash3-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="10">Pas de resultat.</td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Floating Action Button -->
<div class="fab-container">
    <div class="fab shadow">
        <div class="fab-content">
            <i class="bi bi-plus text-white fs-1"></i>
        </div>
    </div>
    <div class="sub-button shadow">
        <!-- Button trigger modal -->
        <span data-bs-toggle="modal" data-bs-target="#addTrainee">
            <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Ajouter un stagiaire">
                <i class="bi bi-person-plus-fill text-white fs-4"></i>
            </button>
        </span>
    </div>
    <div class="sub-button shadow">
        <!-- Button trigger modal -->
        <span data-bs-toggle="modal" data-bs-target="#addMajor">
            <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Ajouter un filiére">
                <i class="bi bi-lightbulb-fill text-white fs-4"></i>
            </button>
        </span>
    </div>
</div>

<!-- Modals for floating actions -->
<?php require_once base_path('views/trainee/partials/modal.major/create.view.php') ?>
<?php require_once base_path('views/trainee/partials/modal.trainee/create.view.php') ?>

<!-- Modals table -->

<!-- Modal showTrainee -->
<div class="modal fade" id="showTrainee" tabindex="-1" aria-labelledby="showTraineeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="showTraineeLabel">Informations Stagiaire</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Insert Content Here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal updateTrainee -->
<div class="modal fade" id="updateTrainee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateTraineeLabel">Modifier Informations</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/trainee/update" method="POST">
                <input type="text" name='_method' value="PUT" hidden>
                <div class="modal-body">
                    <!-- Insert Content Here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal deleteTrainee -->
<div class="modal fade" id="deleteTrainee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteTraineeLabel">Confirmer Suppression</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/trainee/delete" method="POST">
                <input type="text" name='_method' value="DELETE" hidden>
                <div class="modal-body">
                    <!-- Insert Content Here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Supprimer</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require_once base_path('views/partials/footer.view.php') ?>