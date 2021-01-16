var mayur = {
    name : 'mayur',
    age : 22,
    job : 'teacher',
    presentation : function (style, timeOfDay){
        if(style === 'formal')
        {
            console.log('Good ' + timeOfDay + ' ladies and gentalman ' + 'I\'m '+ this.name);
        }
        else if(style === 'friendly')
        {
            console.log('Hey! What\'s up? I\'m '+ this.name + ' Good ' + timeOfDay + ' everyone!');
        }        
    }
}
var mike = {
    name : 'mike',
    age : 22,
    job : 'designer'
};

mayur.presentation('formal', 'morning');
mayur.presentation('friendly','evening');

mayur.presentation.call(mike,'formal','morning');

mayur.presentation.apply(mike,['formal','morning']); 
/*This will not work in this code because our code doesn't 
get any array argument. but this is only for your reference that the 'apply' is called something like this.*/

var mayurFriendly = mayur.presentation.bind(mayur,'friendly');
mayurFriendly('morning');
mayurFriendly('night');