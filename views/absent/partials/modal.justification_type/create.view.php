<!-- Modal addJustificationType -->
<div class="modal fade" id="addJustificationType" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addJustificationTypeLabel" aria-hidden="true">
    <div class="modal-dialog modal-centered">
        <div class="modal-content">
            <form id="register-form" action="/absent/types/add" method="POST" autocomplete="off">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addJustificationTypeLabel">Ajouter Justification Type</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-container">

                        <input type="text" name="old_filiere_id" value="<?= $_GET['filiere_id'] ?? '' ?>" hidden>

                        <div class="row">
                            <div class="col-auto">
                                <label for="justification_type" class="col-form-label">Nouveau type</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="justification_type" name="justification_type" required>
                            </div>
                        </div>

                        <hr>

                        <h6>Type existants:</h6>
                        <div class="types">
                            <ul class="list">
                                <?php if (isset($justifications_types) && !empty($justifications_types)) : ?>
                                    <?php foreach ($justifications_types as $justification_type) : ?>
                                        <li><?= $justification_type ?></li>
                                    <?php endforeach ?>
                                <?php else : ?>
                            </ul>
                            <p class="msg-empty">Pas encore de types.</p>
                        <?php endif ?>
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
    const typesDivElement = document.querySelector(".types")
    const typesUlElement = typesDivElement.querySelector(".list")

    const typeInput = document.querySelector("input#justification_type")
    const newTypeLiElement = document.createElement("li")

    typeInput.addEventListener("keyup", (event) => {
        const typeValue = event.currentTarget.value
        const msgEmpty = typesDivElement.querySelector(".msg-empty")

        if (msgEmpty) {
            typesDivElement.removeChild(msgEmpty)
        }

        newTypeLiElement.style.fontWeight = "bold"
        newTypeLiElement.textContent = typeValue
        typesUlElement.appendChild(newTypeLiElement)
    })
</script>