'use strict'

let name = document.querySelector("#name");

name.addEventListener("input", evt => {
    console.log(name.value);
    document.getElementById("nameError").innerText = '';
    if (name.value.length > 0 && name.value.length < 3) {
        document.getElementById("nameError").innerText = 'Noch zu kurz!';
    }
});