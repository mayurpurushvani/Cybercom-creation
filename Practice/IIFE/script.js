function game()
{
    var score = Math.random() * 10;
    console.log(score >= 5);
}
game();


/* The above function is simple, while the below function is called as IIFE
Immidiate Invoke Function Expression.
The above function is known as simple function declratation but we don't need to only declare
the function but we need the function as an expression way. Syntax must follow..!
*/


(function (goodluck) {
    
    var score = Math.random() * 10;
    console.log(score >= 5 - goodluck);
})(5);