<?php require base_path('views/partials/head.view.php'); ?>
<?php require base_path('views/partials/sidebar.view.php'); ?>

<form action="/search" method="GET">
    <?php if (isset($success)) : ?>
        <div class="alert alert-success" role="alert">
            <?= $success ?>
        </div>
    <?php endif ?>
    <div class="d-grid grid-center">
        <select class="form-select " id="filiere" name="filiere">
            <option selected disabled>-- Selectioner filiere --</option>
            <?php foreach ($filieres as $filiere) : ?>
                <option value="<?= $filiere['filiere'] ?>"><?= $filiere['filiere'] ?></option>
            <?php endforeach ?>
        </select>
        <select class="form-select " id="annee_etude" name="annee_etude">
            <option selected disabled>-- Selectioner annee_etude --</option>
            <?php if (isset($annees_etudes)) : ?>
                <?php foreach ($annees_etudes as $annee_etude) : ?>
                    <option value="<?= $annee_etude ?>"><?= $annee_etude ?></option>
                <?php endforeach ?>
            <?php endif ?>
        </select>
        <div>
            <button type="submit" class="btn btn-secondary m-auto">Recherche</button>
        </div>
    </div>
</form>

<hr>

<?php if (isset($stagiaires)) : ?>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>nom</th>
                <th>prenom</th>
                <th>filiere</th>
                <th>annee_etude</th>
                <th>type_bac</th>
                <th>annee_bac</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stagiaires as $stagiaire) : ?>
                <?php extract($stagiaire) ?>
                <tr>
                    <td><?= $id ?></td>
                    <td><?= $nom ?></td>
                    <td><?= $prenom ?></td>
                    <td><?= $filiere ?></td>
                    <td><?= $annee_etude ?></td>
                    <td><?= $type_bac ?></td>
                    <td><?= $annee_bac ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php endif ?>

<?php require base_path('views/partials/footer.view.php'); ?>