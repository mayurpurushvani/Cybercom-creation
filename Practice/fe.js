
var whatDoWeDo = function(job, firstName)
{
    switch(job)
	{
    	case 'teacher':
			return firstName + " is a teacher and teach the coding!";
		case 'doctor':
    		return firstName+ " is a doctor and give a treatments!";
		default:
    		return firstName+ " is nothing!";
	}
}
console.log(whatDoWeDo('teacher','mayur'));
console.log(whatDoWeDo('doctor','mike'));
console.log(whatDoWeDo('driver','john'));