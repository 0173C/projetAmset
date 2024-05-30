function testCheckbox(element) {
    if (element.checked == true) {
        return true;
    }
}

function logout() {
    window.location.href = "logout.php"
}

function redirectFicheSalarie(id) {
    window.location.href = 'feuille_salaries.php?id=' + id;
}

function toggleCheckbox(id) {
    const checkbox = document.getElementById(id)
    if (checkbox) {
        checkbox.checked = !checkbox.checked;
    } else {
        console.error('Checkbox element not found with ID:', id);
    }
}

function rechercher() {
    var checkboxComp = document.getElementById("menu_competence");
    var checkboxesC = checkboxComp.querySelectorAll('input[type="checkbox"]');
    var checkboxSite = document.getElementById("menu_site");
    var checkboxesS = checkboxSite.querySelectorAll('input[type="checkbox"]');
    var retourTab = [];

    // Parcourir les checkboxes de "menu_competence"
    checkboxesC.forEach(function (checkbox) {
        if (checkbox.checked) {
            retourTab.push(checkbox.id);
        }
    });

    // Parcourir les checkboxes de "menu_site"
    checkboxesS.forEach(function (checkbox) {
        if (checkbox.checked) {
            retourTab.push(checkbox.id);
        }
    });

    // Envoyer la requête fetch avec POST et JSON stringify de retourTab
    fetch('trombinoscope.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json; charset=UTF-8'
        },
        body: JSON.stringify(retourTab)
    })
        .then(response => {
            if (response.ok) {
                console.log(retourTab);
                window.location.href = 'trombinoscope.php'
            } else {
                console.error('Erreur lors de la réponse de fetch');
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
        });
}
