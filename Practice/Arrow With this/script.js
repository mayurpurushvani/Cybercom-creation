//ES5
var box5 = {
    color:'green',
    position : 1,
    clickMe : function() {
        var self = this;
        document.querySelector('.green').addEventListener('click',function() {
            var str = 'This is box number ' + self.position + ' and it is ' + self.color;
            alert(str);
        });
    }
}
box5.clickMe();

//ES6

const box6 = {
    color:'red',
    position : 1,
    clickMe : function() {
     
        document.querySelector('.red').addEventListener('click', () =>{
            var str = `This is box number ${this.position} and it is ${this.color}`;
            alert(str);
        });
    }
}
box6.clickMe();


function Person(name)
{
    this.name=name;
}

//ES5
Person.prototype.myFriends = function (friends) {
    
    var arr = friends.map(function(el){
        return this.name + ' is friends with ' + el;
    }.bind(this));
    console.log(arr);

}
var friends = ['anjali','vanshika','akshay','vaishnavi','bhoomi'];
new Person('mayur').myFriends(friends);


//ES6
Person.prototype.myFriends6 = function (friends) {
    
    var arr = friends.map(el => 
        `${this.name} if friends with ${el}`);
    console.log(arr);
}
var friends = ['anjali','vanshika','akshay','vaishnavi','bhoomi'];
new Person('mayur').myFriends6(friends);
