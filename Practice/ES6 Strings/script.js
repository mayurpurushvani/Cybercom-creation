
let firstName = 'mayur';
let lastName = 'purushvani';
const yearOfBirth = 1999;
function calcAge(year)
{
    return 2020 - year;
}

//ES5
console.log("This is " + firstName +" " + lastName + " I was born in " +  yearOfBirth + " and i'm " +  calcAge(yearOfBirth) + " years old!");

//ES6
console.log(`This is ${firstName} ${lastName} I was born in ${yearOfBirth} and i'm ${calcAge(yearOfBirth)} years old`);
//Use back ticks..


const m = `${firstName} ${lastName}`;

console.log(m.startsWith('m'));
//When i search 'M' Capital, it will return false because javascript is case sensitive.

console.log(m.endsWith('ni'));

console.log(m.includes('yu'));
//search from string that it will exists or not!

console.log(`${firstName} `.repeat(5));
//Repeat the string as many times you want!