var array = [];

function checkData() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    if (localStorage.getItem('array')) {
        array = JSON.parse(localStorage.getItem('array'));
    }

    function check_user_register() {
        for (var index = 0; index < array.length; ++index) {

            var temp = array[index];

            if (temp.email == email && temp.password == password) {
                hasMatch = true;
                alert("login successfull");
                break;
            }
            else
            {
                alert("Email & Password is Invalid!");
            }
        }
    }
    check_user_register();

};