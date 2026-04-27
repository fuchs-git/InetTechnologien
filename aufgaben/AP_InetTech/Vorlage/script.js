'use strict'

function updateTabelle(event) {
    let index = event.target.parentElement.parentElement.id;

    fetch('server.php?update_vorhanden=', {
        method: 'POST',
        body: JSON.stringify({
            index: index,
            vorhanden: event.target.checked
        })
    });
}

function neue_kosten(event) {
    if (event.target.contentEditable === 'true') {
        console.log('geht');

        let index = event.target.parentElement.id;

        fetch('server.php?neue_kosten=', {
            method: 'POST',
            body: JSON.stringify({
                index: index,
                kosten: event.target.innerText
            })
        })
            .then(response => response.json())
            .then(json => {
                event.target.innerText = json.text;
                event.target.style.color = json.ok ? 'green' : 'red';
            });
    }
}

document.querySelector('tbody').addEventListener('change', updateTabelle);
document.querySelector('tbody').addEventListener('focusout', neue_kosten);