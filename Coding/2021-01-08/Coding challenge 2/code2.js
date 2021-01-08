//coding challange 2

var john_game1 = 89;
var john_game2 = 120; //141 - if you want draw the match as result 
var john_game3 = 103;

var mike_game1 = 116;
var mike_game2 = 94;
var mike_game3 = 123;

var mary_game1 = 97; //94 - if you want draw the match as result
var mary_game2 = 134;
var mary_game3 = 105;

var avg_john = (john_game1+john_game2+john_game3)/3;
var avg_mike = (mike_game1+mike_game2+mike_game3)/3;
var avg_mary = (mary_game1+mary_game2+mary_game3)/3;

console.log("Average Score of John team is :" + avg_john + "\nAverage Score of mike team is :"+ avg_mike + "\nAverage Score of mary is : " + avg_mary);

if(avg_john > avg_mike && avg_john > avg_mary ) { console.log("\nWinner is : John") }
else if(avg_john < avg_mike && avg_mary < avg_mike) { console.log("\nWinner is : Mike")}
else if(avg_mary > avg_mike && avg_mary > avg_john) { console.log("\nWinner is : Mary")}
else { console.log("\nMatch is draw!")}
