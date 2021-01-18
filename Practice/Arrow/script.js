//Arrow function
const years = [1997,1998,1999,2000,2001];

//ES5
var years5 = years.map(function (el) {
    return 2021 - el;
});
console.log(years5)

//ES6
let years6 = years.map(el => 2021-el);
console.log(years6);                        //For Single argument

years6 = years6.map((el, index) => `Age of element ${index + 1} : ${el}.`);
console.log(years6);                        //For Two arguments

years6 = years6.map((el2, index) => {
    const now = new Date().getFullYear();
    const age = now - el2;
    return `${ el2 }`;
})
console.log(years6);                        //For multiple arguments


