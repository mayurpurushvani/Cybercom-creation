var mayur = {
    name : "mayur",
    yearOfBirth : 1999,
    job : "software engineer"
};
var person = function(name,yearOfBirth,job){
    this.name = name,
    this.yearOfBirth = yearOfBirth,
    this.job = job
    /* Simple calculateAge() method in person class! */ 
    
    /*this.calculateAge = function()      
    {
        console.log(2020 - yearOfBirth);
    }*/

    person.prototype.lastName = 'purushvani';

}; 

/* prototype person class */
person.prototype.calculateAge = function()
{
    console.log(2020 - this.yearOfBirth);
}

var mayur = new person('mayur',1999,'software engineer');
var mike = new person('mike',1998,'designer');
var jhon = new person('jhon',1997,'designer');

mayur.calculateAge();
mike.calculateAge();
jhon.calculateAge();

console.log(jhon.lastName);
console.log(mike.lastName);
console.log(jhon.lastName);