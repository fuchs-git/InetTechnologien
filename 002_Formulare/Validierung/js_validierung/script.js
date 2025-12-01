'use strict'

let form = document.getElementById("registrationForm");


form.addEventListener("submit", function (event) {
    event.preventDefault(); // Verhindert das Standardverhalten (Absenden des Formulars)
    console.log("Formular wurde abgesendet, aber Validierung muss noch durchgeführt werden.");

    let name = document.querySelector("#name").value.trim();
    let email = document.querySelector("#email").value.trim();
    let password1 = document.querySelector("#password1").value;
    let password2 = document.querySelector("#password2").value;

    let errors = [];

// Name darf nicht leer sein
    if (name === "") {
        errors.push("Bitte geben Sie Ihren Namen ein.");
    }

// E-Mail muss ein gültiges Format haben
    let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailPattern.test(email)) {
        errors.push("Bitte geben Sie eine gültige E-Mail-Adresse ein.");
    }

// Passwort: Länge und Übereinstimmung prüfen
    if (password1.length < 8 || password1.length > 30) {
        errors.push("Das Passwort muss zwischen 8 und 30 Zeichen lang sein.");
    }
    if (password1 !== password2) {
        errors.push("Die Passwörter stimmen nicht überein.");
    }


    // Fehler anzeigen und Absenden verhindern
    let errorMessagesDiv = document.getElementById("errorMessages");
    errorMessagesDiv.innerHTML = "";  // Vorherige Fehlermeldungen leeren

    if (errors.length > 0) {
        event.preventDefault();  // Absenden verhindern
        errorMessagesDiv.innerHTML = errors.join("<br>");  // Fehlermeldungen anzeigen
    } else {
        console.log('Daten wurden via JS (ClientSide) validiert.')
        form.submit();
    }

});

