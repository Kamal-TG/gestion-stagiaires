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
                     <!-- <td>
                        <form action='/history' method='POST'>
                            <input style="display:none" name='form1' type='number' value=<?= $id?>/>
                            <button type='submit' class='bi bi-eye-fill border-0'>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action='/absence' method='POST'>
                            <input style="display:none"  name='form2' type='number' value=<?= $id?>/>
                            <button type='submit'>
                                <i class="bi bi-clipboard2-plus-fill"></i>
                            </button>
                        </form>
                    </td>  -->
                    <td><a href='/history'><i class="bi bi-eye-fill"></i></a></td>
                    <td><a href='/absence'><i class="bi bi-clipboard2-plus-fill"></i></a></td> 
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php endif ?>
</div>

<?php require base_path('views/partials/footer.view.php'); ?>