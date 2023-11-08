function toggleCheckbox(element) {
    element.checked = !element.checked;
}

function testCheckbox(element) {
    if (element.checked == true) {
        return true;
    }
}

function rechercher() {
    // Vérification checkbox = True ou False
    let madrid = document.getElementById('Madrid').checked;
    var xmlhttp = new XMLHttpRequest();
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