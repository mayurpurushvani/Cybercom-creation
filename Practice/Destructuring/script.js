//ES5
var mayur = ['mayur',22];
var name = mayur[0];
var age = mayur[1];
console.log ( name , age);


//ES6
const [name1, age1] = ['mayur', 22];
console.log(name1,age1);

const obj = {
    firstName  :  'mayur',
    age2  :  22
};

const {firstName,age2} = obj;
console.log(firstName,age2);

const {firstName : a, age2 : b} = obj
console.log(a,b);



function calcAgeRetirement(year)
{
    const age = new Date().getFullYear() - year;
    return [age, 65 - age];
}

const [age3,retirement] = calcAgeRetirement(1999);
console.log(age3);
console.log(retirement);