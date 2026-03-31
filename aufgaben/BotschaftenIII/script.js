'use strict';

let input = document.querySelector('#input');

input.addEventListener('input', event => {
    if (input.value.trim().length > 0) {
        fetch('server.php?suche=' + encodeURIComponent(input.value))
            .then(response => response.json())
            .then(json => {
                console.log(json);
                let s = '';
                for (let element of json) {
                    s += `<option value="${element}">`;
                }
                document.querySelector('#laender').innerHTML = s;
            });
    }
});

input.addEventListener('keyup', evt => {
    if (evt.key === 'Enter') {
        let country = input.value.trim();
        console.log(country);
        fetch('server.php?gebe_daten=' + encodeURIComponent(country))
            .then(response => response.json())
            .then(json => {
                console.log(json);
                input.blur();
                document.querySelector('main h2').innerText =
                    `Deutsche Vertretungen in ${country}`;
                let s = '<p>';
                for (let entry of json) {
                    if ('leader' in entry) {
                        s += `Leitung: ${entry['leader']}<br>`;
                    }

                    if ('city' in entry) {
                        s += `Stadt: ${entry['city']}<br>`;
                    } else if ('country' in entry) {
                        s += `Stadt: ${entry['country']}<br>`;
                    } else {
                        s += `Stadt: -<br>`;
                    }

                    if ('address' in entry) {
                        s += `Adresse: ${entry['address']}<br>`;
                    } else if ('postal' in entry) {
                        s += `Adresse: ${entry['postal']}<br>`;
                    } else {
                        s += `Adresse: -<br>`;
                    }

                    if ('phone' in entry) {
                        s += `Telefon: ${entry['phone']}<br>`;
                    }

                    if ('mail' in entry) {
                        s += `E-Mail: ${entry['mail']}<br>`;
                    }

                    s += `</p><p>`;

                    if ('open' in entry) {
                        s += `${entry['open']}<br>`;
                    }

                    if ('misc' in entry) {
                        s += `${entry['misc']}<br>`;
                    }

                    if ('website' in entry) {
                        let url = Array.isArray(entry['website']) ? entry['website'][0] : entry['website'];
                        s += `<a href="${url}" target="_blank">${url}</a><br>`;
                    }

                    s += `</p><hr>`;
                }

                document.querySelector('#result').innerHTML = s;
            });
    }
});