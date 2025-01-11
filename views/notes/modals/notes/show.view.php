<!-- Notes -->
<div>
    <h4><?= $nom ?> <?= $prenom ?></h4>
    <div class="row">
        <div class="col-auto">
            <p><strong>Filiere:</strong> <?= $filiere_intitule ?></p>
        </div>
        <div class="col-auto">
            <p><strong>Année d'étude:</strong> <?= $annee_etude ?></p>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover text-center" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th colspan="3">Module</th>
                    <th colspan="3" rowspan="2">Note</th>
                </tr>
                <tr>
                    <!-- Module -->
                    <th>Intitule</th>
                    <th>Code</th>
                    <th>Coefficient</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($modules) && !empty($modules)) : ?>
                    <?php foreach ($modules as $module) : ?>
                        <?php extract($module) ?>
                        <tr>
                            <td><?= $intitule ?></td>
                            <td><?= $code ?></td>
                            <td><?= $coefficient ?></td>
                            <td style="width: 20%;">
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <input class="activate form-check-input position-static ml-0" type="radio">
                                    </div>
                                    <input type="number" class="note form-control" name="notes[<?= $module_id ?>]" step="0.01" min="0.00" max="20.00" value="<?= $note ?? '' ?>" disabled>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7">Pas des modules.</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>

    <!-- Added information to send -->
     <input type="text" name="stagiaire_id" value="<?= $stagiaire_id ?>" hidden>
     <input type="text" name="filiere_id" value="<?= $filiere_id ?>" hidden>

</div>