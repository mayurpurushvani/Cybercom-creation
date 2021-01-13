var jhon = {
    fullName : 'jhon',
    mass : 60,
    height : 6,
    jhonBMI : 0,
    calculateJhonBMI : function()
    {
        this.jhonBMI = (this.mass/(this.height*this.height))
    }
};
jhon.calculateJhonBMI();
console.log(jhon.fullName);
console.log(jhon.jhonBMI);


var mike = {
    fullName : 'Mike',
    mass : 90,
    height : 5,
    mikeBMI : 0,
    calculateMikeBMI : function()
    {
        this.mikeBMI = (this.mass/(this.height*this.height))
    }
};
mike.calculateMikeBMI();
console.log(mike.fullName);
console.log(mike.mikeBMI);

//HIGHEST BMI
if ( jhon.jhonBMI > mike.mikeBMI)
{
    console.log(jhon.fullName +" Has a highest BMI !");
}
else if ( jhon.jhonBMI < mike.mikeBMI)
{
    console.log(mike.fullName +" Has a highest BMI !");
}

//IF SAME BMI
else
{  
    console.log("Both have a Same BMI !");
}