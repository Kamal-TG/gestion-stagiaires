<?php require base_path('views/partials/head.view.php'); ?>
<?php require base_path('views/partials/sidebar.view.php'); ?>

<div class="container-fluid">
    <div>
        <form class="row" action="/absents/show" method="POST">
            <select class="col form-select" id="filiere" name="filiere">
                <option selected disabled>-- Selectioner filiére --</option>
                <?php foreach ($filieres as $filiere) : ?>
                    <option value="<?= $filiere ?>"><?= $filiere ?></option>
                <?php endforeach ?>
            </select>
            <div class="col">
                <button type="submit" class="btn btn-secondary m-auto">Recherche</button>
            </div>
    </div>
</div>

<?php if (isset($stagiaires)) : ?>
    <h2>Filiére: <?= $filiere ?></h2>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Annee Etude</th>
                <th scope="col">Historique</th>
                <th scope="col">Absence</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stagiaires as $stagiaire) : ?>
                <?php extract($stagiaire) ?>
                <tr>
                    <th scope="row"><?= $id ?></th>
                    <td><?= $nom ?></td>
                    <td><?= $prenom ?></td>
                    <td><?= $annee_etude ?></td>
                    <td><i class="bi bi-eye-fill"></i></td>
                    <td><i class="bi bi-clipboard2-plus-fill"></i></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php endif ?>
</div>

<?php require base_path('views/partials/footer.view.php'); ?>