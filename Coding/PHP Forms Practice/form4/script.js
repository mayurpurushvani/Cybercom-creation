
function validateForm() {
    let name = document.forms["form"]["name"];
    let email = document.forms['form']['email'];
    let subject = document.forms['form']['subject'];
    let message = document.forms['form']['message'];

    if (name.value == "") {
        window.alert("Please enter your name.");
        name.focus();
        return false;
    }
    if (email.value == "") {
        window.alert("Please enter your email.");
        email.focus();
        return false;
    }

    if (subject.value == "") {
        window.alert("Please enter your subject.");
        subject.focus();
        return false;
    }

    if (message.value == "") {
        window.alert("Please enter your message.");
        message.focus();
        return false;
    }

}