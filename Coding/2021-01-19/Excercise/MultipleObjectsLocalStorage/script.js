function person(name, age, email, telephoneNo)
{
    var array = [];
    var add = {
        name : name,
        age : age,
        email : email,
        telephoneNo : telephoneNo
    } 

    array.push(add);
    array.push(JSON.parse(localStorage.getItem('array')));
    console.log(array);

    localStorage.setItem("array", JSON.stringify(array));

};

person('mayur',22,'mayurpurushvani@gmail.com',9409650342);
person('vaishnavi',23,'vaishnavi@gmail.com',8745878951);
person('akshay',22,'akshay@gmail.com',87457898954);