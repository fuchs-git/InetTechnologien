'use strict';

let eingabefeld = document.getElementById('username');

eingabefeld.addEventListener('input', e => {
    let neuer_nutzername = eingabefeld.value;

    fetch('server.php?nutzername=' + encodeURIComponent(neuer_nutzername))
        .then(response => response.text())
        .then(text => {
            if (text === 'schon vorhanden') {
                eingabefeld.style.backgroundColor = 'red';
            } else {
                eingabefeld.style.backgroundColor = 'lightgreen';
            }
        });
});

