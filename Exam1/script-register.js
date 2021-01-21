var array = [];
var hasMatch = false;

function addElement() {
    var sname = document.getElementById('name').value;
    var semail = document.getElementById('email').value;
    var spwd = document.getElementById('password').value;
    var scpwd = document.getElementById('confirm_password').value;
    var scity = document.getElementById('city').value;
    var sstate = document.getElementById('state').value;



    /*if(spwd !== scpwd)
    {
        alert("Does not match password and confirm password!");
    }*/

    /*
    if(sname.length && semail.length && spwd.length && scpwd.length && scity.length && sstate.length < 1)
    {
        alert("Fill the foem first!");
    }

    else
    {
*/
    var admin = {
        name: sname,
        email: semail,
        password: spwd,
        city: scity,
        state: sstate
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
        }
    }
    check_user_register();
    if (hasMatch === false) {
        array.push(admin);
        console.log(array);
        localStorage.setItem("array", JSON.stringify(array));
        var ask = window.confirm("You are registerd successfully");
        if (ask) {
            window.location.href = "login.html";
        }
    }
    
};




/*var array = [];

function addElement()
{
	var sname = document.getElementById('name').value;
	var semail = document.getElementById('email').value;
	var spassword = document.getElementById('password').value;

    if(sname.value  || semail.value || spassword.value  === )
    {
        alert("Fill the form first!");
    }
    else
    {
    var person = {
		name : sname,
		email : semail,
		password : spassword
	};

	if(localStorage.getItem('array'))
	{
		array = JSON.parse(localStorage.getItem('array'));
	}

	array.push(person);
    console.log(array);
	localStorage.setItem("array", JSON.stringify(array));
	
    alert(sname + " " + semail + " " + spassword + " added at index " + array.length);
    //window.localStorage.href("login.html");
}
};



function disableSubmit() {
    document.getElementById("submit").disabled = true;
   }
  
    function activateButton(element) {
  
        if(element.checked) {
          document.getElementById("submit").disabled = false;
         }
         else  {
          document.getElementById("submit").disabled = true;
        }
  
    }

    */