
const passDomEl = document.getElementById('pass');
const confirmedDomPassEl = document.getElementById('confirmed-pass');

const eye_closed = document.getElementById('eye_closed');
const eye_closed2 = document.getElementById('eye_closed2');

const eye_open = document.getElementById('eye_open');
const eye_open2 = document.getElementById('eye_open2');

eye_closed.addEventListener('click', () => {
    if (passDomEl.hasAttribute('type')) {
        passDomEl.removeAttribute('type')
        eye_closed.classList.add('not_see');
        eye_open.classList.remove('not_see');
    } 
})

eye_open.addEventListener('click', () => {
    passDomEl.setAttribute('type', 'password')
    eye_open.classList.add('not_see');
    eye_closed.classList.remove('not_see');
})

eye_closed2.addEventListener('click', () => {
    if (confirmedDomPassEl.hasAttribute('type')) {
        confirmedDomPassEl.removeAttribute('type')
        eye_closed2.classList.add('not_see');
        eye_open2.classList.remove('not_see');
    } 
})

eye_open2.addEventListener('click', () => {
    confirmedDomPassEl.setAttribute('type', 'password')
    eye_open2.classList.add('not_see');
    eye_closed2.classList.remove('not_see');
})
