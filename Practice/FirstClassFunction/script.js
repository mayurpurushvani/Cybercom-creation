var years = [1999,1972,1937,2005,1975];

function arraycalc (arr,fn)
{
    var arrRes = [];
    for(var i = 0; i < arr.length; i++)
    {
        arrRes.push(fn(arr[i]));
    }
    return arrRes;
}
function calculateAge(el) {
    return 2020 - el; 
}
function isFullAge(el)
{
    return el >= 18;
}

function maxHartBeats (el)
{
    if(el >= 18 && el <= 81)
    {
        return Math.round(206.9 - (0.67 * el));
    }
    else
    {
        return -1;
    }
}
var ages = arraycalc(years,calculateAge);
var fullAges = arraycalc(ages,isFullAge);
var rates = arraycalc(ages,maxHartBeats);

console.log(ages);
console.log(fullAges);
console.log(rates);