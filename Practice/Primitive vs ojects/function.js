//primitives
var a = 23;
var b = a;
a = 46;
console.log(a);
console.log(b);

//Objects
var obj = {
    name : 'mayur',
    age : 22
};

var obj2 = obj;
obj.age = 30;
console.log(obj.age);
console.log(obj2.age);

//Functions
var age = 28;
var obj3 = {
    name : 'mike',
    age : 30
};
function change(a, b) {
    a = 30;
    b.city = 'rajkot';
}

change(age,obj3);
console.log(age);
console.log(obj3.city);