
function validateForm() {
    let fname = document.forms["form"]["fname"];
    let lname = document.forms['form']['lname'];
    let day = document.forms['form']['date'];
    let month = document.forms['form']['month'];
    let year = document.forms['form']['year'];
    let country = document.forms['form']['country']
    let email = document.forms['form']['email'];
    let phone = document.forms['form']['phone'];
    let password = document.forms['form']['password'];
    let cpassword = document.forms['form']['cpassword'];
    let male = document.form.gender[0];
    let female = document.form.gender[1];
    let terms = document.forms['form']['terms'];

    if (fname.value == "") {
        window.alert("Please enter your first name.");
        fname.focus();
        return false;
    }
    if (lname.value == "") {
        window.alert("Please enter your lastname.");
        lname.focus();
        return false;
    }

    if (day.selectedIndex < 1 || month.selectedIndex < 1 || year.selectedIndex < 1) {
        if (day.value == 'Date' || month.value == 'Month' || year.value == 'Year') {
            window.alert("Please select proper Date of Birth.");
            day.focus();
            return false;
        }
    }
    if (!male.checked && !female.checked) {
        alert('You must select male or female');
        return false;
    } 
    if (country.value == "Country") {
        window.alert("Please select proper country.");
        country.focus();
        return false;
    }
    if (email.value == "") {
        window.alert("Please enter your email.");
        email.focus();
        return false;
    }
    if (phone.value == "" ) {
        window.alert("Please enter your phone number.");
        phone.focus();
        return false;
    }
    
    if (password.value == "") {
        window.alert("Please enter password.");
        password.focus();
        return false;
    }
    if (cpassword.value == "") {
        window.alert("Retype the password.");
        cpassword.focus();
        return false;
    }
    if (password.value != cpassword.value) {
        window.alert("Make sure! password and confirm password is same!");
        cpassword.focus();
        return false;
    }
    if(!terms.checked) {
        window.alert("Please agree to the Terms");
        terms.focus();
        return false;
    }

    /*
        if (!chkHockey.checked && !chkcricket.checked && !chkfootall.checked && !chkvollyball.checked && !chkbadminton.checked) {
            alert('Please select at least one Game.');
            chkHockey.focus();
            return false;
        }
    
        if (!male.checked && !female.checked) {
            alert('You must select male or female');
            return false;
        }
        if (age.selectedIndex < 1) {
            alert("Please enter your Age.");
            age.focus();
            return false;
        }
        if (!allowedExtensions.exec(filePath)) {
            alert('Invalid file type');
            fileInput.value = '';
            return false;
        }
    */
}