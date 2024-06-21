const fname = document.getElementById('fname');
const lname = document.getElementById('lname');
const email = document.getElementById('email');
const password = document.getElementById('password');
const copypwd = document.getElementById('copypawd');
const phone = document.getElementById('phone');
const address = document.getElementById('address');
const image = document.getElementById('image');
const form = document.getElementById('form');

const fname_error = document.getElementById('fname_error');
const lname_error = document.getElementById('lname_error');
const email_error = document.getElementById('email_error');
const password_error = document.getElementById('password_error');
const copypwd_error = document.getElementById('copypawd_error');
const phone_error = document.getElementById('phone_error');
const address_error = document.getElementById('address_error');
const img_error = document.getElementById('image_error');


function clearError(input, error) {
    input.addEventListener('input', () => {
        error.innerHTML = '';
        validateForm();
    });
}

clearError(fname, fname_error);
clearError(lname, lname_error);
clearError(email, email_error);
clearError(password, password_error);
clearError(copypwd, copypwd_error);
clearError(phone, phone_error);
clearError(address, address_error);
clearError(image, img_error);


form.addEventListener('submit', (e) => {
    var flag = true;
    var email_check = /^([A-Za-z0-9_\-\.])+@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;


    if (fname.value.trim() === '' || fname.value.trim() == null) {
        e.preventDefault();
        fname_error.innerHTML = "First Name is required";
    } else if (!/^[a-zA-Z\s]+$/.test(fname.value.trim())) {
        e.preventDefault();
        fname_error.innerHTML = "First Name should contain only letters and spaces";
    }


    if (lname.value.trim() === '' || lname.value.trim() == null) {
        e.preventDefault();
        lname_error.innerHTML = "Last Name is required";
    } else if (!/^[a-zA-Z\s]+$/.test(lname.value.trim())) {
        e.preventDefault();
        lname_error.innerHTML = "Last Name should contain only letters and spaces";
    }


    if (email.value.trim() === '' || email.value.trim() == null) {
        e.preventDefault();
        flag = false;
        email_error.innerHTML = "Email is required";
    }
    if (!email.value.match(email_check) && flag == true) {
        e.preventDefault();
        email_error.innerHTML = "Email is not in the correct format";
    }


    if (password.value.trim() === '') {
        e.preventDefault();
        password_error.innerHTML = "Password is required";
    } else if (password.value.trim().length < 8) {
        e.preventDefault();
        password_error.innerHTML = "Password must be at least 8 characters long";
    }


    if (copypwd.value.trim() === '') {
        e.preventDefault();
        copypwd_error.innerHTML = "Confirm Password is required";
    } else if (password.value !== copypwd.value) {
        e.preventDefault();
        copypwd_error.innerHTML = "Passwords do not match";
    }


    if (phone.value === '' || phone.value == null) {
        e.preventDefault();
        phone_error.innerHTML = "Phone number is dc required";
    } else if (phone.value.length != 10) {
        e.preventDefault();
        phone_error.innerHTML = "Invalid Number = Phone number is of size 10";
    }


    if (address.value.trim() === '' || address.value.trim() == null) {
        e.preventDefault();
        address_error.innerHTML = "Address is required";
    }


    if (image.value === '' || image.value == null) {
        e.preventDefault();
        img_error.innerHTML = "Image is required";
    }


    if (password.value != copypwd.value) {
        e.preventDefault();
        password_error.innerHTML = "Password does not match";
        copypwd_error.innerHTML = "Confirm Password does not match";
    }

    $('#successModal').modal('show');


    setTimeout(function () {
        $('#form')[0].submit();
    }, 2000);
})