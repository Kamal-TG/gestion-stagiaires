<!-- Modal updateTrainee -->
<div class="modal fade" id="updateTrainee" tabindex="-1" aria-labelledby="updateTraineeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateTraineeLabel">Information Stagiaire</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/trainee/update" method="POST">
                <input type="text" name='_method' value="PUT" hidden>
                <div class="modal-body">
                    <!-- Trainee Information -->
                    <div class="col-md-8">
                        <!-- Content Here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>