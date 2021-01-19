//ES5
var Person5 = function(name,yearOfBirth, job)
{
    this.name = name;
    this.yearOfBirth = yearOfBirth;
    this.job = job;
}
Person5.prototype.calculateAge = function () {
    var age = new Date().getFullYear() - this.yearOfBirth;
    console.log(age);
}

var Athlete5 = function (name, yearOfBirth, job, olymicGames, medals) {
    

    Person5.call(this, name, yearOfBirth, job);
    this.olymicGames = olymicGames;
    this.medals = medals;
}

Athlete5.prototype = Object.create(Person5.prototype);

Athlete5.prototype.wonMedal = function(){
    this.medals ++;
    console.log(this.medals);
}
var jhonAthlete5 = new Athlete5('mayur', 1999, 'swimming', 12,7);

jhonAthlete5.calculateAge();
jhonAthlete5.wonMedal();



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
        var age = new Date().getFullYear() - this.yearOfBirth;
        console.log(age);   
    }
}
class Athlet6 extends Person6
{
    constructor(name, yearOfBirth, job, olymicGames, medals){

    super(name,yearOfBirth,job);
    this.olymicGames = olymicGames;
    this.medals = medals;
    }
    wonMedal()
    {
        this.medals ++;
        console.log(this.medals);
    }
}

const jhonAthlete6 = new Athlet6('mayur', 1999, 'swimming', 12, 7);
jhonAthlete6.calculateAge();
jhonAthlete6.wonMedal();