'use strict';

if (document.querySelector('#banner_submit') !== null) {
    document.querySelector('#banner_submit').addEventListener('click', evt => {
        evt.preventDefault();
        // console.log('geklickt')
        fetch("start-session.php").then(response => {
            document.querySelector('#banner').style.display = 'none';
        })
    })
}

document.querySelector('#input').addEventListener('input', evt => {

    if (document.querySelector('#input').value.trim().length > 0) {
        fetch('server.php?suche=' + document.querySelector('#input').value).
        then(response => response.json()).
        then(data => {
            console.log(data)
            let s = ""
            for (let element of data) {
                s += `<option value='${element}'>`
            }
            document.querySelector('#vertretungsliste').innerHTML = s;
        })
    }
})

document.querySelector('#input').addEventListener('keyup', evt => {
    if(evt.key === 'Enter') {
        let country = document.querySelector('#vertretungsliste option:first-of-type').value
        console.log(country)
        fetch('server.php?gebe_daten=' + country).
        then(response => response.json()).
        then(json => {
            console.log(json)
            document.querySelector('#input').blur();
            document.querySelector('main h2:first-of-type').innerText = `Deutsche Vertretungen in ${country}`;

            let s = "<p>";


            for (let entry of json) {

                if ("leader" in entry) {
                    s += `Leitung: ${entry['leader']}<br>`;
                }

                if ("city" in entry) {
                    s += `Stadt: ${entry['city']}<br>`;
                } else if ("country" in entry) {
                    s += `Stadt: ${entry['country']}<br>`;
                } else {
                    s += `Stadt: -<br>`
                }

                if ("address" in entry) {
                    s += `Adresse: ${entry['address']}<br>`;
                } else if ("postal" in entry) {
                    s += `Adresse: ${entry['postal']}<br>`;
                } else {
                    s += `Adresse: -<br>`;
                }

                if ("phone" in entry) {
                    s += `Telefon: ${entry['phone']}<br>`;
                }

                if ("mail" in entry) {
                    s += `E-Mail: ${entry['mail']}<br>`;
                }

                s+= `</p>`

                s+= `<p>`
                if ("open" in entry) {
                    s+= `${entry['open']}<br>`
                }
                if ("misc" in entry) {
                    s += `${entry['misc']}<br>`;
                }

                if ("website" in entry) {
                    s+= `<a href>${entry['website'][0]}</a><br>`
                }
                s+=`<hr>`
            }
            document.querySelector('#result').innerHTML = s;
        })
    }
})




