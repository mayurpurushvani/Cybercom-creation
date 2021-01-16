function InterviewQuestions (job)
{
    if(job === 'teacher')
    {
        return function(name)
        {
            console.log("What subject do you teach "+ name + " ?");
        }
    }
    else if (job === 'designer')
    {
        return function(name)
        {
            console.log("What is UI designing "+name + " ?");
        }
    }
    else
    {
        return function (name)
        {
            console.log("What do you do "+ name + " ?");
        }
    }
}

var teacherQuestion = InterviewQuestions('teacher');
teacherQuestion('mayur');

//OR

InterviewQuestions('teacher')('mike');
InterviewQuestions('designer')('jhon');
InterviewQuestions('developer')('ellon');