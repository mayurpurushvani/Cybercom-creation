var array = [];

function addElement()
{
	var sname = document.getElementById('name').value;
	var semail = document.getElementById('email').value;
	var bdate = document.getElementById('dateOfBirth').value;
	 var person = {
		name : sname,
		email : semail,
		birthdate : bdate
	};

	if(localStorage.getItem('array'))
	{
		array = JSON.parse(localStorage.getItem('array'));
	}

	array.push(person);
    console.log(array);
	localStorage.setItem("array", JSON.stringify(array));
	
	alert(sname + " " + semail + " " + bdate + " added at index " + array.length);
	
};
