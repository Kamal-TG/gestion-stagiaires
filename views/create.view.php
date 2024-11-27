<?php require base_path('views/partials/head.view.php'); ?>
<?php require base_path('views/partials/sidebar.view.php'); ?>

<div class="form-container">
    <form id="register-form" action="/add" method="POST">

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

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h3>Information Personnelles</h3>
        </div>

        <div class="mb-3 row">
            <div class="col">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" value="<?= $_POST['nom'] ?? '' ?>" required>
            </div>
            <div class="col">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" name="prenom" id="prenom" value="<?= $_POST['prenom'] ?? '' ?>" required>
            </div>
        </div>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h3>Information Scolaire</h3>
        </div>
        <div class="mb-3">
            <label for="filiere" class="form-label">Filière</label>
            <select class="form-select" name="filiere" id="filiere">
                <option disabled selected value> -- Selection un filière -- </option>
                <option value="Full Stack">Full Stack</option>
                <option value="Développemet Mobile">Développemet Mobile</option>
                <option value="Cyber Sécurité">Cyber Sécurité</option>
                <option value="Réseau">Réseau</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="annee_etude" class="form-label">Année étude</label>
            <input type="number" class="form-control" name="annee_etude" id="annee_etude" min="2000" step="1" value="<?= $_POST['annee_etude'] ?? '' ?>" required>
            <?php if (isset($errors['annee_etude'])): ?>
                <p class="text-danger fst-italic">
                    <?= $errors['annee_etude'] ?>
                </p>
                <?php endif ?>
            </div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h3>Information sur Baccalauréat</h3>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="type_bac" class="form-label">Type baccalauréat</label>
                    <select class="form-select" name="type_bac" id="type_bac">
                        <option disabled selected value> -- Selection un type baccalauréat -- </option>
                        <option value="PC">PC</option>
                        <option value="SVT">SVT</option>
                        <option value="SM">SM</option>
                </select>
            </div>
            <div class="mb-3 col">
                <label for="annee_bac" class="form-label">Année baccalauréat</label>
                <input type="number" class="form-control" name="annee_bac" id="annee_bac" min="2000" step="1" value="<?= $_POST['annee_bac'] ?? '' ?>" required>
                <?php if (isset($errors['annee_bac'])): ?>
                    <p class="text-danger fst-italic">
                        <?= $errors['annee_bac'] ?>
                    </p>
                <?php endif ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>

<?php require base_path('views/partials/footer.view.php'); ?>