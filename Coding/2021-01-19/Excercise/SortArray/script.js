function sort(a,b)
{
    //const name = a.age;
    //const name2 = b.age;

    const name = a.name.toUpperCase();
    const name2 = b.name.toUpperCase();

    let comp = 0;

    if(name > name2)
    {
        comp = 1;
    }
    else if(name < name2)
    {
        comp = -1;
    }
    return comp;
}

const student = [
    {name : 'mayur', age : 22}, 
    {name : 'Vanshika', age : 21}, 
    {name : 'vaishnavi', age : 23}, 
    {name : 'akshay', age : 22}
    ];
console.log(student.sort(sort));