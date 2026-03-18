'use strict';

const apply = document.querySelector('#apply')
const reset = document.querySelector('#reset')
let inputs = document.querySelectorAll('#kontaktverwaltung input');
UpdateContacts();

apply.addEventListener('click', (e) => {
    e.preventDefault()

    let o = {
        vorname: inputs[0].value,
        nachname: inputs[1].value,
        strasse: inputs[2].value,
        stadt: inputs[3].value,
        plz: inputs[4].value,
        email: inputs[5].value,
    }

    fetch('server.php?neuer_kontakt=', {
        method: 'POST',
        body: JSON.stringify(o),
    })
        .then(res => res.json())
        .then(json => {
            if (json['success'] === true) {
                ClearInputs();
                UpdateContacts();
                document.querySelector('#formular').style.backgroundColor = 'white';
            } else {
                document.querySelector('#formular').style.backgroundColor = 'red';
            }
        })
})

reset.addEventListener('click', (e) => {
    e.preventDefault();

    ClearInputs()

    document.querySelector('#formular').style.backgroundColor = 'white';
})

function ClearInputs() {
    document.querySelectorAll('#kontaktverwaltung input').forEach(el => {
        el.value = '';
    })

    apply.disabled = true;
}

function CheckInputs() {
    for (let input of inputs) {
        if (input.value.length < 1) {
            apply.disabled = true;

            return;
        }
    }

    apply.disabled = false;
}

function UpdateContacts() {
    let contactlist = document.querySelector('#ContactList');

    fetch('server.php?name_abrufen=')
        .then(res => res.json())
        .then(json => {
            if (json['success'] === false) {
                contactlist.innerHTML = '<p class="fehler">Fehler beim Abrufen der Daten</p>';
            } else {
                let s = '<h2>Übersicht</h2>';

                json.forEach(name => {
                    s += `<div> ${name[0]} ${name[1]}</div>`;
                })

                contactlist.innerHTML = s;

                document.querySelectorAll('#ContactList div').forEach(el => el.addEventListener('click', e => {
                    fetch('server.php?details_abrufen=' + el.innerText)
                        .then(res => res.json())
                        .then(json => {
                            if (json['success'] === false) {
                                contactlist.innerHTML = '<p class="fehler">Fehler beim Abrufen der Daten</p>';
                            }
                            else if (json['not found'] === true) {
                                contactlist.innerHTML = '<p class="fehler">Kontakt nicht gefunden</p>';
                            }
                            else {
                                for (let i = 0; i < inputs.length; i++) {
                                    console.log(inputs[i]);
                                    console.log(json[i]);
                                    inputs[i].value = json[0][i];
                                }
                            }

                        })
                }))
            }
        })
}

inputs.forEach(input => {
    input.addEventListener('input', CheckInputs)
})