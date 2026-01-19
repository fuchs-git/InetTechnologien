'use strict';

let b = document.getElementById('anmelden');

b.addEventListener('click', e => {
    e.preventDefault();
    console.log('klappt');
    let password = document.querySelector('#pass').value;
    console.log(password);
    document.querySelector('form').submit();
})


