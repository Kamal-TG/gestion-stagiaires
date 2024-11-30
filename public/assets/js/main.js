const filiereSelect = document.querySelector('select#filiere')
const anneeEtudeSelect = document.querySelector('select#annee_etude')

filiereSelect.addEventListener('change', (event) => {
    const filiere = event.target.value
    const data = new URLSearchParams({ filiere })
    
    let xhr = new XMLHttpRequest()

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                const annees_etudes = JSON.parse(xhr.response)
                anneeEtudeSelect.innerHTML = '<option selected disabled>-- Selectioner annee_etude --</option>'
                for (const annee_etude of annees_etudes) {
                    const option = document.createElement('option')
                    option.setAttribute('value', annee_etude)
                    option.textContent = annee_etude
                    anneeEtudeSelect.appendChild(option)
                }
            } else {
                console.log('error')
            }
        }

    }

    xhr.open('POST', '/list')
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    xhr.send(data.toString())
})

const today = new Date()
const anneeEtudeInput = document.querySelector('input#annee_etude')
anneeEtudeInput.setAttribute('max', today.getFullYear())


const anneeBacInput = document.querySelector('input#annee_bac')
anneeBacInput.setAttribute('max', today.getFullYear()-1)
//code add
function Event1(Val) {
    if(Val=='Close'){
        document.getElementById('MaxBar').style.display = 'none'
        document.getElementById('MinBar').style.display = 'block'
    }else {
        document.getElementById('MaxBar').style.display = 'block'
        document.getElementById('MinBar').style.display = 'none'
        
    }

}

