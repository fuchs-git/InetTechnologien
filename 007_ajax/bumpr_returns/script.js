'use strict';

let eingabefeld = document.getElementById('suche')
let ausgabe = document.getElementById('ausgabe')

eingabefeld.addEventListener('input', evt => {
    let suchtext = eingabefeld.value;
    fetch('server.php?suche=' + encodeURIComponent(suchtext))
    .then(response => response.json())
        .then(json => {
            if('antwort' in json) {
                ausgabe.innerText = JSON.stringify(json);
            }
        })
})