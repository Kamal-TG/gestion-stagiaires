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
                    <th colspan="3">Actions</th>
                </tr>
                <tr>
                    <th>Date</th>
                    <th>Nombre Heures</th>
                    <th>Justifie</th>
                    <th>Document</th>
                    <th>Type</th>
                    <th>Details</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($absences) && !empty($absences)) : ?>
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
                                    <a href="/absent/justify/show?document=<?= $document ?>" target="_blank">
                                        <i class="bi bi-filetype-pdf text-primary fs-5"></i>
                                    </a>
                                <?php endif ?>
                            </td>
                            <td><?= $type ?></td>
                            <td><?= $details ?></td>
                            <td>
                                <a href="/absent/delete?filiere_id=<?= $_GET['filiere_id'] ?? null ?>&absence_id=<?= $absence_id ?>">
                                    <i class="bi bi-trash3-fill text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7">Pas d'absences.</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>