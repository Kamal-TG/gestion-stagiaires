<!-- Modal addModule -->
<div class="modal fade" id="addModule" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addModuleLabel" aria-hidden="true">
    <div class="modal-dialog modal-centered modal-lg">
        <div class="modal-content">
            <form id="register-form" action="/notes/modules/add" method="POST" autocomplete="off">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModuleLabel">Ajouter Module</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-container">
                        <div class="row">

                            <div class="col">
                                <input type="text" name="old_filiere_id" value="<?= $_GET['filiere_id'] ?? '' ?>" hidden>

                                <div class="mb-3">
                                    <label for="select_filiere_id" class="col-form-label">Filiére</label>
                                    <select class="form-select" id="select_filiere_id" name="select_filiere_id">
                                        <option hidden disabled selected value> -- Selectionner un filiére -- </option>
                                        <?php foreach ($filieres ?? [] as $filiere) : ?>
                                            <option value="<?= $filiere['filiere_id'] ?>" <?= (int)($_GET['filiere_id'] ?? 0) === $filiere['filiere_id'] ? 'selected' : '' ?>><?= $filiere['intitule'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label" for="intitule">Intitulé</label>
                                    <input type="text" class="form-control" name="intitule" id="intitule" value="<?= $_POST['intitule'] ?? '' ?>" placeholder="Ex: Développement Front-End" required>
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label" for="code">Code</label>
                                    <input type="text" class="form-control" name="code" id="code" value="<?= $_POST['code'] ?? '' ?>" placeholder="Ex: M201, EGTS201.." required>
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label" for="coefficient">Coefficient</label>
                                    <input type="number" class="form-control" id="coefficient" name="coefficient" min="1" max="10">
                                </div>
                            </div>

                            <div class="col border-start">
                                <h6>Modules existants:</h6>
                                <div class="items">
                                    <ul class="list">
                                        <?php if (isset($modules) && !empty($modules)) : ?>
                                            <?php foreach ($modules as $module) : ?>
                                                <li><?= "{$module['intitule']} ({$module['code']})" ?></li>
                                            <?php endforeach ?>
                                        <?php else : ?>
                                    </ul>
                                    <p class="msg-empty">Pas encore de modules.</p>
                                <?php endif ?>
                                </div>
                            </div>
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
    const itemsDiv = document.querySelector(".items")
    const listElement = itemsDiv.querySelector(".list")

    const intituleInput = document.querySelector("input#intitule")
    const newItem = document.createElement("li")
    const newIntitlule = document.createTextNode("")
    const newCode = document.createTextNode("")
    newItem.style.fontWeight = "bold"
    newItem.appendChild(newIntitlule)
    newItem.appendChild(newCode)

    intituleInput.addEventListener("keyup", (event) => {
        const intituleValue = event.currentTarget.value.trim()
        const msgEmpty = itemsDiv.querySelector("p")

        if (msgEmpty) {
            itemsDiv.removeChild(msgEmpty)
        }

        newIntitlule.nodeValue = intituleValue

        listElement.appendChild(newItem)
    })

    const codeInput = document.querySelector("input#code")
    codeInput.addEventListener("keyup", (event) => {
        const codeValue = event.currentTarget.value.trim()
        newCode.nodeValue = ` (${codeValue})`
        
        listElement.appendChild(newItem)
    })

    /* AJAX for 'filiere' selection */
    const filiereSelect = document.querySelector("select#select_filiere_id")
    filiereSelect.addEventListener("change", (event) => {
        fetch(`/notes/modules/show?filiere_id=${event.target.value}`)
            .then((response) => response.json())
            .then((modules) => {
                while (listElement.firstChild) {
                    listElement.removeChild(listElement.firstChild)
                }

                const msgEmpty = itemsDiv.querySelector("p")
                if (msgEmpty) {
                    itemsDiv.removeChild(msgEmpty)
                }

                if (modules.length < 1) {
                    const p = document.createElement("p")
                    p.textContent = "Pas encore de modules."
                    itemsDiv.appendChild(p)

                    return
                }

                modules.forEach((module) => {
                    const moduleIntitule = `${module.intitule} (${module.code})`
                    const newModuleItem = document.createElement("li")
                    newModuleItem.textContent = moduleIntitule
                    listElement.appendChild(newModuleItem)
                });
            })
    })
</script>
