var array = [];
var hasMatch = false;
var temp ;



function checkData() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    if (localStorage.getItem('array')) {
        array = JSON.parse(localStorage.getItem('array'));
    }

    function check_user_register() {
        for (var index = 0; index < array.length; index++) {

            temp = array[index];

            if (array[index].email == email && array[index].password == password) {
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
        window.location.href = "index.html";
    }
};