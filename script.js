let btn = document.getElementsByClassName('toggle-btn');
let signupForm, loginForm, signupBlk, loginBlk;

let ids = ['signup', 'login', 'signup-blck', 'login-blck'];
let arr = [signupForm, loginForm, signupBlk, loginBlk] = ids.map(elem => document.getElementById(elem));

const toggleVisibility = () => {
    for(let i = 0; i < arr.length; i++) {
        arr[i].classList.toggle('invisible');
    }
}

for(let i = 0; i < btn.length; i++) {
    btn[i].addEventListener('click', toggleVisibility);
}