const boxes = document.querySelectorAll('.box');

//ES5
/*var box5 = Array.prototype.slice.call(boxes);

box5.forEach(function(cur) {
      cur.style.backgroundColor = 'red';
});
*/

//ES6
const box6 = Array.from(boxes);
box6.forEach(cur => cur.style.backgroundColor = 'green'); 



//ES5
/*for(var i = 0; i<box5.length; i++)
{
    if(box5[i].className === 'box blue')
    {
        continue;
        //break;
    }
    box5[i].textContent = 'I Changed to blue';
}*/


//ES6
for(const cur of box6)
{
    if(cur.className.includes('blue'))
    {
        continue;
    }
    cur.textContent = 'I changed to blue';
}


//ES5
var ages = [12,17,8,21,14,11];
var full = ages.map(function (cur) {
    return  cur >= 18;
});
console.log(full);

console.log(full.indexOf(true));
console.log(ages[full.indexOf(true)]);


//ES6
console.log(ages.findIndex(cur => cur >= 18));
console.log(ages.find(cur => cur >= 18 ));