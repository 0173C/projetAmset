function testCheckbox(element) {
    if (element.checked == true) {
        return true;
    }
}

function rechercher() {
    // Vérification checkbox = True ou False
    let madrid = document.getElementById('Madrid').checked;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("retour").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "recherche.php");
    xmlhttp.send();
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
    checkboxesC.forEach(function(checkbox) {
        if (checkbox.checked) {
            retourTab.push(checkbox.id);
        }
    });
    checkboxesS.forEach(function(checkbox) {
        if (checkbox.checked) {
            retourTab.push(checkbox.id);
        }
    })
    /*      -- AJAX REQUETE --
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("txtHint").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "trombinoscope.php?q=" + str, true);
      xmlhttp.send();
      */ 

    console.log(retourTab);
    fetch('trombinoscope.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ valeurs: retourTab })
        .then(response => {
            console.log('Envoyé')
        })
        .catch(error => {
            console.log('Erreur')
        })
    })
}