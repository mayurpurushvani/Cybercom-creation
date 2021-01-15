var personProto = {
    calculateAge : function (){
        console.log(2020 - this.yearOfBirth);
    }
        
};

var mayur =  Object.create(personProto);
mayur.name = 'mayur';
mayur.yearOfBirth = 1999;
mayur.job = 'software engineer';

var jhon = Object.create(personProto, {
    name : { value : 'jhon'},
    yearOfBirth : {value : 1998 },
    job : {value : 'designer'}
});