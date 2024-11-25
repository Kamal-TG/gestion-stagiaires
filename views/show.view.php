<?php require base_path('views/partials/head.view.php'); ?>
<?php require base_path('views/partials/sidebar.view.php'); ?>

<form method="POST">
    <?php if (isset($success)) : ?>
        <div class="alert alert-success" role="alert">
            <?= $success ?>
        </div>
    <?php endif ?>
    <div class="row">
        <select class="col form-select" id="id" name="id">
            <option selected disabled>-- Selectioner id --</option>
            <?php foreach ($ids as $id) : ?>
                <option value="<?= $id ?>"><?= $id ?></option>
            <?php endforeach ?>
        </select>
        <div class="col">
            <button type="submit" class="btn btn-secondary m-auto">Recherche</button>
        </div>
    </div>
</form>

<hr>

<?php if (isset($stagiaire)) : ?>
    <table class="table table-striped table-hover">
        <tr>
            <th>#</th>
            <td><?= $stagiaire['id'] ?></td>
        </tr>
            <th>nom</th>
            <td><?= $stagiaire['nom'] ?></td>
        </tr>
            <th>prenom</th>
            <td><?= $stagiaire['prenom'] ?></td>
        </tr>
            <th>filiere</th>
            <td><?= $stagiaire['filiere'] ?></td>
        </tr>
            <th>annee_etude</th>
            <td><?= $stagiaire['annee_etude'] ?></td>
        </tr>
            <th>type_bac</th>
            <td><?= $stagiaire['type_bac'] ?></td>
        </tr>
            <th>annee_bac</th>
            <td><?= $stagiaire['annee_bac'] ?></td>
        </tr>
    </table>
<?php endif ?>

<?php require base_path('views/partials/footer.view.php'); ?>