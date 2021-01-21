function logout() {
    sessionStorage.clear();
    window.location.href = "Login.html";
}

function addUser()
{
    var uname = document.getElementById('name').value;
    var uemail = document.getElementById('email').value;
    var upwd = document.getElementById('password').value;
    var ubirthDate = document.getElementById('birthDate').value;

    var user = {
        name: uname,
        email: uemail,
        password: upwd,
        dateOfBirth = ubirthDate 
    };

    if (localStorage.getItem('array')) {
        array = JSON.parse(localStorage.getItem('array'));
    }
    function check_user_register() {
        for (var index = 0; index < array.length; ++index) {

            var temp = array[index];

            if (temp.email == semail) {
                hasMatch = true;
                alert("admin already exist with same email");
                break;
            }
            else
            {
                
            }
        }
    }
    check_user_register();
    if (hasMatch === false) {
        array.push(admin);
        console.log(array);
        localStorage.setItem("array", JSON.stringify(array));
        var message = window.confirm("registerd successfully");
        if (message) {
            window.location.href = "login.html";
        }
    }
    
};

