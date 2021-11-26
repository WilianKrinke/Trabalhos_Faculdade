const passEl = document.getElementById('pass');
const confirmedPassEl = document.getElementById('confirmed-pass');

const buttonEl = document.getElementById('eye');
const buttonConfirmedEl = document.getElementById('eye2');


buttonEl.addEventListener('click', () => {
    if (passEl.hasAttribute('type')) {
        passEl.removeAttribute('type')
    } else {
        passEl.setAttribute('type', 'password')
    }
})

buttonConfirmedEl.addEventListener('click', () => {
    if (confirmedPassEl.hasAttribute('type')) {
        confirmedPassEl.removeAttribute('type')
    } else {
        confirmedPassEl.setAttribute('type', 'password')
    }
})