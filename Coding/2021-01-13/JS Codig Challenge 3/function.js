var restaurent1 = 124;
var restaurent2 = 48;
var restaurent3 = 268;

function calculateTip()
{
    //Restaurent 1
    if (restaurent1 <= 50)
    {
        var r1Bill = (restaurent1 * 20) / 100;
        console.log("Total amount of restaurent 1 is : " + restaurent1)
        console.log("Total amount of tip is :" +r1Bill);
    }
    
    else if(restaurent1 >= 50 && restaurent1 <= 200)
    {
        var r1Bill = (restaurent1 * 15) / 100;
        console.log("Total amount of restaurent 1 is : " + restaurent1)
        console.log("Total amount of tip is :" +r1Bill);
    }

    else
    {
        var r1Bill = (restaurent1 * 10) / 100;
        console.log("Total amount of restaurent 1 is : " + restaurent1)
        console.log("Total amount of tip is :" +r1Bill);
    }

    //Restaurent 2
    if(restaurent2 <= 50)
    {
        var r2Bill = (restaurent2 * 20) / 100;
        console.log("Total amount of restaurent 2 is : " + restaurent2)
        console.log("Total amount of tip is :" +r2Bill);
    }

    else if(restaurent1 >= 50 && restaurent1 <= 200)
    {
        var r2Bill = (restaurent2 * 15) / 100;
        console.log("Total amount of restaurent 2 is : " + restaurent2)
        console.log("Total amount of tip is :" +r2Bill);
    }

    else
    {
        var r2Bill = (restaurent2 * 10) / 100;
        console.log("Total amount of restaurent 2 is : " + restaurent2)
        console.log("Total amount of tip is :" +r2Bill);
    }
    

    //Restaurent 3
    if(restaurent3 <= 50)
    {   
        var r3Bill = (restaurent3 * 20) / 100;
        console.log("Total amount of restaurent 3 is : " + restaurent3)
        console.log("Total amount of tip is : " +r3Bill);
    }
    else if(restaurent3 >= 50 && restaurent3 <= 200)
    {
        var r3Bill = (restaurent3 * 15) / 100;
        console.log("Total amount of restaurent 3 is : " + restaurent3)
        console.log("Total amount of tip is :" +r3Bill);
    }

    else
    {
        var r3Bill = (restaurent3 * 10) / 100;
        console.log("Total amount of restaurent 3 is : " + restaurent3)
        console.log("Total amount of tip is :" +r3Bill);
    }
    

};
calculateTip();