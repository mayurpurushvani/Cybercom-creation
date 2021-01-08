//coding challange 1
var mark_height,mark_mass,john_height,john_mass;

mark_height=5;
mark_mass=90;

john_height=6;
john_mass=60;

var mark_BMI=(mark_mass/(mark_height*mark_height))
var john_BMI=(john_mass/(john_height*john_height))

console.log("Mark's BMI : ",mark_BMI+"\n");
console.log("John's BMI : ",john_BMI+"\n");

var BMI=(mark_mass/(mark_height*mark_height))>(john_mass/(john_height*john_height));

console.log("Is mark's BMI higher than john's?",BMI);
