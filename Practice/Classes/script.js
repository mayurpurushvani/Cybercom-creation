//ES5

var Person5 = function(name,yearOfBirth, job)
{
    this.name = name;
    this.yearOfBirth = yearOfBirth;
    this.job = job;
}
Person5.prototype.calculateAge = function () {
    var age = new Date().getFullYear - this.yearOfBirth;
    console.log(age);
}

var jhon5 = new Person5('mayur', 1999, 'web developer');



//ES6
class Person6
{
    constructor(name, yearOfBirth, job)
    {
        this.name = name;
        this.yearOfBirth = yearOfBirth;
        this.job = job;
    }
    calculateAge()
    {
        var age = new Date().getFullYear - this.yearOfBirth;
        console.log(age);   
    }
    static greetings()
    {
        console.log("Hello!");
    }
}

const jhon6 = new Person6('mayur', 1999, 'web developer');

Person6.greetings(); //Access the metods