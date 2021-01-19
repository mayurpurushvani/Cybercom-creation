var x = 0;
var array = Array();

function addElement()
{
    array[x] = document.getElementsByName("name").value;
    array[x+1] = document.getElementsByName("email").value;
    array[x+2] = document.getElementsByName("dateOfBirth").value;
    alert('Element ' + array[x] + " " + array[x+1] + " " + array[x+2] + " added at index " + x);
    x++;
    //document.getElementById("name").value = "";
};

/*
function display()
{
    for(var y = 0; y < array.length; y++)
    {
        e += "Element " + y + " = " + array[y] + "<br>";
    }
    document.getElementsById("Result").innerHTML = e;
    //window.location.href = "view.html";
    window.location.replace("view.html");
}
*/

function display() 
{
    var e;
    for(var y = 0; y < array.length; y ++)
    {
        e += "Element " + y + " = " + array[y] + "<br>";
    }
    //return e;
    window.location.href = "view.html"  ;
  
} 