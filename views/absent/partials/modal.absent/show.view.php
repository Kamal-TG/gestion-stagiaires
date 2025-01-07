<!-- Absent Information -->
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
                    <th colspan="3">absence</th>
                    <th colspan="3">Justification</th>
                </tr>
                <tr>
                    <th>Date</th>
                    <th>Nombre Heures</th>
                    <th>Justifie</th>
                    <th>Document</th>
                    <th>Type</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($absences)) : ?>
                    <?php foreach ($absences as $absence) : ?>
                        <?php extract($absence) ?>
                        <tr>
                            <td><?= $date_absence ?></td>
                            <td><?= $nombre_heures ?></td>
                            <td>
                                <?php if ($justifie) : ?>
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                <?php else : ?>
                                    <i class="bi bi-x-circle-fill text-danger"></i>
                                <?php endif ?>
                            <td>
                                <?php if ($document) : ?>
                                    <i class="bi bi-filetype-pdf"></i>
                                <?php endif ?>
                            </td>
                            <td><?= $type ?></td>
                            <td><?= $details ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">Pas d'absences.</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>