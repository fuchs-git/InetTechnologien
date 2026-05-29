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
document.querySelector('tbody').addEventListener('click', e => {
    document.querySelectorAll('tr').forEach(tr => tr.style.background ='')
    let tr= e.target.parentElement;
    if(tr.tagName.toLowerCase() === 'td') {
        tr = tr.parentElement
    }
    tr.style.background = 'lightblue';

    let index = tr.id;
    fetch('server.php?informationen=' + index)
    .then(response => response.json())
    .then(json => {
        let s = `
        <img src="${json.bild}" alt="Bild">
        <h1>${json.name}</h1>
        <table>
            <tr><td>Zustand bei 20°C:</td><td>${json.zustand}</td></tr>
            <tr><td>Dichte:</td><td>${json.dichte}</td></tr>
            <tr><td>Schmelzpunkt:</td><td>${json.schmelztemperatur}</td></tr>
            <tr><td>Siedepunkt:</td><td>${json.siedetemperatur}</td></tr>
        </table>
        <p>${json.beschreibung}</p>
        `;
        console.log(json.bild)
        document.querySelector('#info').innerHTML = s;
    })

});

fetch('server.php?load_index')
.then(response => response.json())
.then(json => {
    if (json.status === 'ok'){
        document.querySelector('#' + json.index).children[0].click();

        // window.scroll(0,)
    }
})
