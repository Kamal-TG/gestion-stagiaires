<?php require_once base_path('views/partials/head.view.php'); ?>
<?php require_once base_path('views/partials/sidebar.view.php'); ?>
<?php require_once base_path('views/partials/topbar.view.php'); ?>
<?php require_once base_path('views/partials/heading.view.php'); ?>

<form class="mb-4" autocomplete="off" action="/notes/create" method="GET">

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
        <div class="col-auto">
            <button class="btn btn-primary">Récupérer</button>
        </div>
    </div>
</form>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <form>
            <p class="text-muted mb-1">Filteres</p>
            <div class="filters row">
                <div class="col-auto">
                    <input type="text" class="form-control" id="name" placeholder="Nom/Prénom">
                </div>
                <div class="col-auto">
                    <select class="form-select" id="annee_etude">
                        <option selected value="">Tous Années Études</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </div>
        </form>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Année Étude</th>
                        <th>Notes</th>
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
                                <td class="align-middle"><?= $annee_etude . ($annee_etude > 1 ? 'éme' : 'er') ?></td>
                                <td>
                                    <a
                                        href="/notes/show?filiere_id=<?= $_GET['filiere_id'] ?>&<?= http_build_query($stagiaire) ?>"
                                        class="send-query change-url btn btn-info btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#showNotes">
                                        <i class="bi bi-list-check"></i>
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
        <span data-bs-toggle="modal" data-bs-target="#addModule">
            <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Ajouter un module">
                <i class="bi bi-journals text-white fs-4"></i>
            </button>
        </span>
    </div>
</div>

<!-- Modals for floating actions -->
<?php require_once base_path('views/notes/modals/module/create.view.php') ?>

<!-- Modals table -->

<!-- Modal showNotes -->
<div class="modal fade" id="showNotes" data-bs-backdrop="static" tabindex="-1" aria-labelledby="showNotesLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="showNotesLabel">Liste des notes</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/notes/update" method="POST" enctype="multipart/form-data">
                <input type="text" name="_method" value="PUT" hidden>
                <div class="modal-body">
                    <!-- Insert Content Here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require_once base_path('views/partials/footer.view.php') ?>
