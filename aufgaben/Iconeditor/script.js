"use strict";


function save_icon() {
    if (document.querySelector('#file_path').value !== "") {
        document.querySelector('#file_path').style.borderColor = 'black';
        let temp = [[document.querySelector('#file_path').value], [document.querySelectorAll('#editor div').forEach(div => {
                if (div.style(.backgroundColor === 'black'))
                {
                    temp[1].push(1);
                }
            else
                {
                    temp[1].push(0);
                }
            }
        );
    } else {
        document.querySelector('#file_path').style.borderColor = 'red';
    }
}


function createIconGUI(kantenlaenge) {
    let s = '';

    for (let i = 0; i < kantenlaenge * kantenlaenge; i++) {
        s += "<div></div>";
    }

    document.querySelector("#editor").innerHTML = s;
    document.querySelector("#editor").style.width = ((15 + 2) * kantenlaenge) + 'px';

    document.querySelectorAll('#editor div').forEach(div => {
        div.addEventListener('click', (e) => {
            if (div.style.backgroundColor === 'black') {
                div.style.backgroundColor = '';
            } else div.style.backgroundColor = 'black';
        })
    })
}

let kantenlaenge = 15
createIconGUI(kantenlaenge);


document.querySelector('#reset').addEventListener('click', (e) => {
    document.querySelectorAll('#editor div').forEach(div => {
        div.style.backgroundColor = '';
    })
})

