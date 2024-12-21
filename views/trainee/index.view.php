<?php require base_path('views/partials/head.view.php'); ?>
<?php require base_path('views/partials/sidebar.view.php'); ?>
<?php require base_path('views/partials/topbar.view.php'); ?>
<?php require base_path('views/partials/heading.view.php'); ?>

<form class="mb-4" autocomplete="off" action="/trainee/create" method="GET">

    <!-- Show error message -->
    <?php if (isset($errors['general'])): ?>
        <div class="alert alert-danger" role="alert">
            <?= $errors['general'] ?>
        </div>
    <?php endif ?>

    <!-- Show success message -->
    <?php if (isset($success)): ?>
        <div class="alert alert-success" role="alert">
            <?= $success ?>
        </div>
    <?php endif ?>

    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="filiere_id" class="col-form-label">Filiére</label>
        </div>
        <div class="col-auto">
            <select class="form-select" name="filiere_id">
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
            <button class="btn btn-primary">Recherche</button>
        </div>
    </div>
</form>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tables de données stagiaires</h6>
    </div>
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
                                <td class="align-middle"><?= $filiere_code ?></td>
                                <td class="align-middle"><?= $annee_etude ?></td>
                                <td class="align-middle"><?= $baccalaureat_code ?></td>
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
                                        href="/trainee/update?<?= http_build_query($stagiaire) ?>"
                                        class="send-idx change-url btn btn-warning btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#updateTrainee"
                                    >
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#addTrainee">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
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
        <span data-bs-toggle="modal" data-bs-target="#addMajor" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Ajouter un filiére">
            <button type="button" class="btn btn-primary">
                <i class="bi bi-lightbulb-fill text-white fs-4"></i>
            </button>
        </span>
    </div>
</div>

<!-- Modals for floating actions -->
<?php require base_path('views/trainee/modals/major/create.view.php') ?>
<?php require base_path('views/trainee/modals/trainee/create.view.php') ?>

<!-- Madals for table icons -->
<?php require base_path('views/trainee/modals/trainee/show.view.php') ?>
<?php require base_path('views/trainee/modals/trainee/update.view.php') ?>


<?php require base_path('views/partials/footer.view.php') ?>