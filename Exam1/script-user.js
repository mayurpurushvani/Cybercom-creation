var array_user = [];
var hasMatch = false;

function logout() {
    sessionStorage.clear();
    window.location.href = "Login.html";
}


function age_u_18() {

    var array = localStorage.getItem('array_user');
    var items = JSON.parse(array);
    array = items;
    var count = 0,
        count1 = 0,
        count2 = 0;


    for (var k = 0; k < array.length; k++) {
        var age = getAge(array[k].userbirthDate);
        console.log(age);
        if (age < 18) {
            console.log("into the function")
            count++;
        }
        localStorage.setItem("age_under_18", count);
        if (age > 50) {
            console.log("into the function")
            count1++;
        }
        localStorage.setItem("age_a_50", count1);
        if (age > 18 && age < 50) {
            console.log("into the function")
            count2++;
        }
        localStorage.setItem("age_u_18_a_50", count2);

    }
}

function getAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}



function addUser()
{
    var name = document.getElementById('name1').value;
    var uemail = document.getElementById('email').value;
    var upwd = document.getElementById('password').value;
    var userbirthDate = document.getElementById('birthDate').value;

    var user = {
        name: name,
        email: uemail,
        password: upwd,
        userbirthDate: userbirthDate 
    };

    if (localStorage.getItem('array_user')) {
        array_user = JSON.parse(localStorage.getItem('array_user'));
    }
    function check_user_register() {
        for (var index = 0; index < array_user.length; ++index) {

            var temp = array_user[index];

            if (temp.email == email) {
                hasMatch = true;
                alert("admin already exist with same email");
                break;
            }
        }
    }
    check_user_register();
    if (hasMatch === false) {
        array_user.push(user);
        console.log(array_user);
        localStorage.setItem("array_user", JSON.stringify(array_user));
        alert("User added");
        location.reload();
    }
    
};



