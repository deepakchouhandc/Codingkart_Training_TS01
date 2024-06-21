const email = document.getElementById('email');
const password = document.getElementById('password');
const form = document.getElementById('form');

const email_error = document.getElementById('email_error');
const password_error = document.getElementById('password_error');

form.addEventListener('submit', (e) => {
    var email_check = /^([A-Za-z0-9_\-\.])+@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    if (email.value.trim() === '') {
        e.preventDefault();
        email_error.innerHTML = "Email is required";
    } else if (!email.value.match(email_check)) {
        e.preventDefault();
        email_error.innerHTML = "Email is not in correct format";
    } else {
        email_error.innerHTML = "";
    }

    if (password.value.trim() === '') {
        e.preventDefault();
        password_error.innerHTML = "Password is required";
    } else {
        password_error.innerHTML = "";
    }
    return true;
});
