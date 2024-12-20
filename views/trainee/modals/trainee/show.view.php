<!-- Modal showTrainee -->
<div class="modal fade" id="showTrainee" tabindex="-1" aria-labelledby="showTraineeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="showTraineeLabel">Information Stagiaire</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Trainee Information -->
                <div class="col-md-8">
                    <?php
                        if (isset($_GET['action']) && $_GET['action'] === 'show') {
                            echo 'Hello fetch';
                            // dd($_GET['stagiaire_idx']);
                        }
                    ?>
                    <h4><?= $nom . ' ' . $prenom ?></h4>
                    <p><strong>Age:</strong> 20</p>
                    <p><strong>Class:</strong> B.Sc. Computer Science</p>
                    <p><strong>Grade:</strong> A</p>
                    <p><strong>Email:</strong> john.doe@example.com</p>
                    <p><strong>Phone:</strong> +123 456 7890</p>
                    <p><strong>Address:</strong> 123 Main Street, City, Country</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>