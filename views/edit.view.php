<?php require base_path('views/partials/head.view.php'); ?>
<?php require base_path('views/partials/sidebar.view.php'); ?>

<form action="/edit" method="POST">
    <?php if (isset($success)) : ?>
        <div class="alert alert-success" role="alert">
            <?= $success ?>
        </div>
    <?php endif ?>
    <div class="row">
        <select class="col form-select" id="old_id" name="old_id">
            <option selected disabled>-- Selectioner ID --</option>
            <?php foreach ($ids as $id) : ?>
                <option value="<?= $id ?>"><?= $id ?></option>
            <?php endforeach ?>
        </select>
        <div class="col">
            <button type="submit" class="btn btn-secondary m-auto">Recherche</button>
        </div>
    </div>
</form>

<hr style="margin: 0;">

<?php if (isset($stagiaire)) : ?>
    <?php extract($stagiaire) ?>
    <div class="form-container">
        <form id="register-form" action="/update" method="POST">
            <!-- <input type="hidden" name="_method" value="PATCH"> -->

            <input type="hidden" name="id" value="<?= $_POST['old_id'] ?? '' ?>">

            <?php if (isset($errors['general'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $errors['general'] ?>
                </div>
            <?php endif ?>

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h3>Information Personnelles</h3>
            </div>

            <div class="mb-3 row">
                <div class="col">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" name="nom" id="nom" value="<?= $nom ?? '' ?>" required>
                </div>
                <div class="col">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" value="<?= $prenom ?? '' ?>" required>
                </div>
            </div>

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h3>Information Scolaire</h3>
            </div>
            <div class="mb-3">
                <label for="filiere" class="form-label">Filière</label>
                <select class="form-select" name="filiere" id="filiere">
                    <option disabled selected value> -- Selection un filière -- </option>
                    <option value="Full Stack" <?= $filiere === 'Full Stack' ? 'selected' : '' ?>>Full Stack</option>
                    <option value="Développemet Mobile" <?= $filiere === 'Développemet Mobile' ? 'selected' : '' ?>>Développemet Mobile</option>
                    <option value="Cyber Sécurité" <?= $filiere === 'Cyber Sécurité' ? 'selected' : '' ?>>Cyber Sécurité</option>
                    <option value="Réseau" <?= $filiere === 'Réseau' ? 'selected' : '' ?>>Réseau</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="annee_etude" class="form-label">Année étude</label>
                <input type="number" class="form-control" name="annee_etude" id="annee_etude" min="2000" step="1" value="<?= $annee_etude ?? '' ?>" required>
                <?php if (isset($errors['annee_etude'])): ?>
                    <p class="text-danger fst-italic">
                        <?= $errors['annee_etude'] ?>
                    </p>
                <?php endif ?>
            </div>
            <div class="mb-3">
                <label for="type_bac" class="form-label">Type baccalauréat</label>
                <select class="form-select" name="type_bac" id="type_bac">
                    <option disabled selected value> -- Selection un type baccalauréat -- </option>
                    <option value="PC" <?= $type_bac === 'PC' ? 'selected' : '' ?>>PC</option>
                    <option value="SVT" <?= $type_bac === 'SVT' ? 'selected' : '' ?>>SVT</option>
                    <option value="SM" <?= $type_bac === 'SM' ? 'selected' : '' ?>>SM</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="annee_bac" class="form-label">Année baccalauréat</label>
                <input type="number" class="form-control" name="annee_bac" id="annee_bac" min="2000" step="1" value="<?= $annee_bac ?? '' ?>" required>
                <?php if (isset($errors['annee_bac'])): ?>
                    <p class="text-danger fst-italic">
                        <?= $errors['annee_bac'] ?>
                    </p>
                <?php endif ?>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
<?php endif ?>

<?php require base_path('views/partials/footer.view.php'); ?>