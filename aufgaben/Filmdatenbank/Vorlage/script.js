'use strict';
let num_regex = /^\d+$/
let zeichen_regex = /[äüöÄÜÖß]/
let email_regx = /^[^\s@]+@[^\s@]+\.[^\s@]+$/

let titel = document.getElementById('titel');
titel.addEventListener('input', evt => {
    document.getElementById('nameError').innerHTML = "";
    if (titel.value.length > 0 && titel.value.length < 3) {
        console.log(titel.value);
        document.getElementById('nameError').innerHTML = "Name zu kurz";
    }
})

let jahr = document.getElementById('jahr');
jahr.addEventListener('input', evt => {
    document.getElementById('jahrError').innerHTML = "";
    if (!num_regex.test(jahr.value)) {
        document.getElementById('jahrError').innerHTML = "Keine gültige Zahl!";
    }
    if (jahr.value < 1900 || jahr.value > 2100) {
        jahr.style.border = '2px solid red';
    }
    if (jahr.value === "") {document.getElementById('jahrError').innerHTML = "";}
})

