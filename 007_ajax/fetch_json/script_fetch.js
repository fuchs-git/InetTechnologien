'use strict';

let eingabefeld = document.getElementById('username');

eingabefeld.addEventListener('input', e => {
    let neuer_nutzername = eingabefeld.value;

    fetch('server.php?nutzername=' + encodeURIComponent(neuer_nutzername))
        .then(response => response.text())
        .then(text => {
            let json = JSON.parse(text);
            if (json['antwort'] === 'schon vorhanden') {
                eingabefeld.style.backgroundColor = 'red';
            } else {
                eingabefeld.style.backgroundColor = 'lightgreen';
            }
        });
});

