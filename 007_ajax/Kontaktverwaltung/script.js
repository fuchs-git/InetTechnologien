'use strict';

let buttons = document.querySelectorAll('#formular button');
let inputs = document.querySelectorAll('#formular input');

buttons[1].addEventListener('click', e => {
    e.preventDefault()
    inputs.forEach(input => {
        input.value = '';
    })
})

function check_inputs(){
    document.querySelector('form').style.background = 'white';
    for (let input of inputs){
        if (input.value === ''){
            buttons[0].disabled = true;
            return;
        }
    }
    buttons[0].disabled = false;

}

inputs.forEach(input => {
    input.addEventListener('input', check_inputs);
})

buttons[0].addEventListener('click', e => {
    e.preventDefault()
    let o = {
        nachname: inputs[0].value,
        vorname: inputs[1].value,
        strasse: inputs[2].value,
        stadt: inputs[3].value,
        plz: inputs[4].value,
        email: inputs[5].value
    }
    fetch('server.php?neuer_kontakt=1', {
        method: 'POST',
        body: JSON.stringify(o)})
        .then(response => response.json())
        .then(json => {
            if (json === 'Hat geklappt') {
                document.querySelector('form').style.background = 'green';
                buttons[1].click();
            }
            else {
                document.querySelector('form').style.background = 'red';
            }
        })


})