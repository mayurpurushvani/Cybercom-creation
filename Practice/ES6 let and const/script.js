
//ES5 variables
var name = 'mayur';
var age = 22;
name = 'mike';
console.log(name);


//ES6 variables
const name1 = 'mayur';
let age2 = 22;
//name1 = 'mike';
console.log(name1);


//ES5 functions
function drivesLicece(passedTest)
{
    if(passedTest)
    {
        //console.log(firstName); //This will retuen undefined.
        var firstName = 'mayur';
        var yearOfBirth = 1999;
        
    }
    //console.log(firstName + ' born in ' + yearOfBirth + ' is now officially allowed to drive a car.'); 
    //ES5 is a function block so, it will work fine
}
drivesLicece(true);

//ES6 functions
function drivesLicece6(passedTest)
{
    if(passedTest)
    {
        //console.log(firstName); //This will return an ERROR.
        let firstName = 'mayur';
        const yearOfBirth = 1999;
        
    }
    //console.log(firstName + ' born in ' + yearOfBirth + ' is now officially allowed to drive a car.'); //
    //ES6 has block scope so it will not allowed to access the variables outside the block scope. ERROR

}
drivesLicece6(true);


//Let's take another example of block scope in ES6

let i = 23;
for ( let i = 0; i < 5; i ++)
{
    console.log(i);
}
console.log(i); //This value remain same which is 23.
//But when i remove the let from for loop, Te scope of i is only one which is 1 2 3 4 5 .
