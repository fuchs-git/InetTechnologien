'use strict'

document.querySelectorAll('input[name="frage1"]').forEach(radio => {
    radio.addEventListener('change', evt => {
        let val = evt.target.value;
        if (val === 'Iron Man') {
            document.getElementById('v1').innerHTML = "<div class='richtig'>Richtig!</div>";
        } else {
            document.getElementById('v1').innerHTML = "<div class='falsch'>Falsch!</div>";
        }
    })
})


document.querySelectorAll('input[name="frage2"]').forEach(radio => {
    radio.addEventListener('change', evt => {
        let val = evt.target.value;
        if (val === 'Zeitstein') {
            document.getElementById('v2').innerHTML = "<div class='richtig'>Richtig!</div>";
        } else {
            document.getElementById('v2').innerHTML = "<div class='falsch'>Falsch!</div>";
        }
    })
})


document.querySelectorAll('input[name="frage3"]').forEach(radio => {
    radio.addEventListener('change', evt => {
        let val = evt.target.value;
        if (val === 'Peter Quill') {
            document.getElementById('v3').innerHTML = "<div class='richtig'>Richtig!</div>";
        } else {
            document.getElementById('v3').innerHTML = "<div class='falsch'>Falsch!</div>";
        }
    })
})

