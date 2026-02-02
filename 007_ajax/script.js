'use strict';

let eingabefeld = document.getElementById('username');
eingabefeld.addEventListener('input', e => {
    let neuer_nutzername = eingabefeld.value;

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.open('GET', 'server.php?nutzername=' + neuer_nutzername, true);

    xmlhttp.addEventListener('readystatechange', e => {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            if (xmlhttp.responseText === 'schon vorhanden') {
                eingabefeld.style.backgroundColor = 'red';
            }
            else {
                eingabefeld.style.backgroundColor = 'lightgreen';
            }
        }
    })
    xmlhttp.send();
})