function validateForm() {
    let name = document.forms["form"]["name"];
    let pass = document.forms['form']['password'];
    let address = document.forms['form']['address'];
    
    let game = document.getElementsByName("game[]");
    let chkHockey = game[0];
    let chkfootall = game[1];
    let chkbadminton = game[2];
    let chkcricket = game[3];
    let chkvollyball = game[4];

    let male = document.form.gender[0];
    let female = document.form.gender[1];
    let age = document.forms["form"]["age"];

    let fileInput = document.getElementById('file');
    let filePath = fileInput.value;
    let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)/;

    if (name.value == "") {
        window.alert("Please enter your name.");
        name.focus();
        return false;
    }
    if (pass.value == "") {
        window.alert("Please enter your password.");
        name.focus();
        return false;
    }

    if (address.value == "") {
        window.alert("Please enter your address.");
        address.focus();
        return false;
    }
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

}