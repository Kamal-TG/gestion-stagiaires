<?php require base_path('views/partials/head.view.php'); ?>
<?php require base_path('views/partials/sidebar.view.php'); ?>

<div class="form-container">
    <form id="register-form" action="/absence2" method="POST">

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
            <h3>Ajouter Absence</h3>
        </div>

        <div class="mb-3 row">
            <div class="col">
                <label for="nombre_heures" class="form-label">Nomber des Heurs</label>
                <input type="number" class="form-control" name="nombre_heures" id="nombre_heures" value="<?= $_POST['nombre_heures'] ?? '' ?>" min='1' max='10' required>
            </div>
            <div class="col">
                <label for="date_absence" class="form-label">Date d'absence</label>
                <input type="date" class="form-control" name="date_absence" id="date_absence" value="<?= $_POST['date_absence'] ?? '' ?>" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="justifie" class="form-label ">Absence justifie
                <input type="radio" class='form-check-input ms-5' name="justifie" id="justifie" value='Oui'><span class='ms-3'>Oui</span>
                <input type="radio" class='form-check-input ms-5'' name="justifie" id="justifie" value='Non'default><span class='ms-3'>Non</span>
            </label>
        </div>
        <div class="mb-3">
            <label for="id_stagaire" class="form-label">Matricule Stagaire</label>
            <input type="number" class="form-control" name="id_stagaire" id="id_stagaire" value="<?= $_POST['id_stagaire'] ?? '' ?>" >
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>

<?php require base_path('views/partials/footer.view.php'); ?>