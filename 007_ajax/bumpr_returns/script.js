'use strict';

let eingabefeld = document.getElementById('suche');
let ausgabe = document.getElementById('ausgabe');

eingabefeld.addEventListener('input', evt => {

    let suchtext = eingabefeld.value.trim();

    // erst ab 3 Zeichen suchen
    if (suchtext.length < 3) {
        ausgabe.innerHTML = "";
        return;
    }

    fetch('server.php?suche=' + encodeURIComponent(suchtext))
        .then(response => response.json())
        .then(json => {

            ausgabe.innerHTML = "";

            if ('antwort' in json) {

                json.antwort.forEach(e => {
                    ausgabe.innerHTML += e + "<br>";
                });

            }

        });

});