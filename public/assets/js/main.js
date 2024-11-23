const selectNiveau = document.querySelector('#niveau')
const selectFiliere = document.querySelector('#filiere')
const selectGroupe = document.querySelector('#groupe')
const data = {
    'Technicien Spécialisé': [
        {
            nom: 'Développement Digital',
            groupes: ['dev101', 'dev102', 'devofs201', 'devofs202']
        },
        {
            nom: 'Infrastructure Digitale',
            groupes: ['id101', 'id102', 'idors201', 'idors202']
        }
    ]
}

selectNiveau.addEventListener('change', () => {
    selectFiliere.innerHTML = '<option disabled selected value> -- Selection un filière -- </option>'

    const selectedNiveau = data[selectNiveau.value]
    selectedNiveau.forEach(filiere => {
        const option = document.createElement('option')
        option.setAttribute('value', filiere.nom)
        option.textContent = filiere.nom
        selectFiliere.add(option)
    });
})

selectFiliere.addEventListener('change', () => {
    selectGroupe.innerHTML = '<option disabled selected value> -- Selection un l\'année-- </option > '

    const filieres = data[selectNiveau.value]
    const slectedFiliere = filieres.find(filiere => filiere.nom === selectFiliere.value)
    const groupes = slectedFiliere.groupes

    groupes.forEach(groupe => {
        const option = document.createElement('option')
        option.setAttribute('value', groupe)
        option.textContent = groupe
        selectGroupe.add(option)
    })
})