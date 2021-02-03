
function validateForm() {
    let email = document.forms['form']['email'];
    let password = document.forms['form']['password'];

    if (email.value == "") {
        window.alert("Please enter your email.");
        email.focus();
        return false;
    }
    if (password.value == "") {
        window.alert("Please enter your password.");
        password.focus();
        return false;
    }

}