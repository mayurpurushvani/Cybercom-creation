var array_user = [];
var hasMatch = false;
var temp ;



function birthday()
{
    var label = document.getElementById('birthday').value;

    var today = new Date();
    var birthDate = new Date(dateString);
    if(today == birthDate)
    {
        label.display =     
    }
}

function checkData() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    if (localStorage.getItem('array_user')) {
        array_user = JSON.parse(localStorage.getItem('array_user'));
    }

    function check_user_register() {
        for (var index = 0; index < array_user.length; index++) {

            temp = array_user[index];

            if (array_user[index].email == email && array_user[index].password == password) {
                hasMatch = true;
                
                break;
                
            }
        }
    }
    check_user_register();

    if(hasMatch == false)
    {
        hasMatch = false;
        alert("Invalid email and password!");
    }
    else{
        sessionStorage.setItem("name", temp.name);
        window.location.href = "subUser.html";
    }
};