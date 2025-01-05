<!-- Modal addMajor -->
<div class="modal fade" id="addMajor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addMajorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="register-form" action="/major/add" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addMajorLabel">Ajouter Filiére</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-container">
                        
                        <div class="mb-3 inputIntitule">
                            <label class="col-form-label" for="intitule">Intitulé</label>
                            <input type="text" class="form-control" name="intitule" id="intitule" value="<?= $_POST['intitule'] ?? '' ?>" placeholder="Ex: Développement Digital" required>
                        </div>

                        <div class="mb-3 inputIntituleCode">
                            <label class="col-form-label" for="code">Abréviation</label>
                            <input type="text" class="form-control" name="code" id="code" value="<?= $_POST['code'] ?? '' ?>" placeholder="Ex: DD" required>
                        </div>

                        <div class="mb-3 inputIntituleCode">
                            <label class="col-form-label" for="nombre_annees">Nombre d'années</label>
                            <select class="form-select" id="nombre_annees" name="nombre_annees">
                                <option value="2">2 ans</option>
                                <option value="3">3 ans</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const inputIntitule = document.querySelector(".inputIntitule > input")
    const inputIntituleCode = document.querySelector(".inputIntituleCode > input")
    inputIntitule.addEventListener("change", () => {
        const textIntitule = inputIntitule.value.trim().toUpperCase()
        inputIntituleCode.value = textIntitule.split(' ').map((word) => word[0]).join('')
    })
</script>