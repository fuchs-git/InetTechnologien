'use strict';

function baue_wetter(ort) {
    fetch('server.php?get_wetter=' + ort)
        .then(res => res.json())
        .then(vorhersage => {
            let s = '';
            vorhersage.forEach((tag, index) => {
                s += `
        <div class="tag${index===0?' selected':''}" id="tag_${index}">
            ${tag.tag}<br><img src="symbole/${tag.symbol}.svg"><br>${tag.min_max}
        </div>`;
            });
            document.querySelector('#auswahl_tag').innerHTML = s;

            document.querySelector('#auswahl_tag').addEventListener('click', e => {
                let tag = e.target;
                if (tag.className === 'scroll') {
                    return;
                }
                if (!tag.classList.contains('tag')) {
                    tag = tag.parentElement;
                }
                let index = +tag.id.replace('tag_', '');

                // wetter.vorhersage[index].verlauf
                let aktuell = vorhersage[index];
                let s = `
        <div>
            <div>${index === 0 ? 'Jetzt' : aktuell.text}</div>
            <div>${index === 0 ? aktuell.verlauf[0].temperatur : aktuell.min_max}<img src="symbole/${index === 0 ? aktuell.verlauf[0].symbol : aktuell.symbol}.svg"></div>
        </div>
        <div>
            <div>${aktuell.beschreibung[0]}</div>
            <div>${aktuell.beschreibung[1] || ''}</div>
        </div>`;
                document.querySelector('#zusammenfassung').innerHTML = s;
                document.querySelector('#auswahl_tag .selected').classList.remove('selected');
                tag.classList.add('selected');

                s = '';
                vorhersage[index].verlauf.forEach(stunde => {
                    s += `
            <div>
                ${stunde.temperatur}<br><br><span>${stunde.wahrscheinlichkeit || ''}</span><br><img src="symbole/${stunde.symbol}.svg"><br>${stunde.text}
            </div>`;
                });
                document.querySelector('#stunden').innerHTML = s;

                // Frosch-Bild ändern
                document.querySelector('#frosch img').src=`froesche/${aktuell.frosch}`;

                document.querySelector('#stunden').scrollLeft = index === 0 ? 0 : 520;
            });

            document.querySelector('#auswahl_tag div').click();

        })

}


let s2 = '';
fetch('server.php?get_ortsnamen')
    .then(response => response.json())
    .then(json => {
        for (let ort of json) {
            s2 += `<option>${ort}</option>`;
        }
        document.querySelector('#auswahl_ort').innerHTML = s2;
        document.querySelector('#auswahl_ort').addEventListener('change', e => {
            baue_wetter(e.target.value);
        });
        baue_wetter(json[0]);
    });


