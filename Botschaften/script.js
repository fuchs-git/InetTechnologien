'use strict';


let banner = document.querySelector('#banner_submit');
if (banner !== null) {
    banner.addEventListener('click', (e) => {
        e.preventDefault();
        fetch("start-session.php").then(response => {
            document.querySelector('#banner').style.display = 'none';
        })
    })
}