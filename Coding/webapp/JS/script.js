function home() {
    window.location.replace('index.php');
}
function contactus() {
    window.location.replace('contactus.php');
}

$(document).ready(function () {
    $('#form').validate({
        rules: {
            name: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true,
            },
            phone: {
                required: true,
                rangelength: [10, 10],
                number: true,
            },
            title: {
                required: true,
                minlength: 3
            },
            created: {
                required: true,
            }
        },
        messages: {
            name: {
                required: '<br>Please enter Name.',
                name: '<br>Please enter Name.',
                minlength: "<br>At least 3 characters long"
            },
            email: {
                required: '<br>Please enter Email Address.',
                email: '<br>Please enter a valid Email Address.',
            },
            phone: {
                required: '<br>Please enter Contact.',
                rangelength: '<br>Contact should be 10 digit number.',
            },
            title: {
                required: '<br>Please enter title',
                minlength: "<br>At least 3 characters long"
            },
            created: {
                required: '<br>Please enter a date time.',
            },
        },
        submitHandler: function (form) {

            form.submit();

        }
    });
});

$('.delete').on('click', function () {
    var id = $(this).data('id');
    console.log(id);
    $.ajax({
        url: "./delete.php",
        data: { row_id: id, action: "submit" },
        type: 'POST',
        success: function (response) {
            console.log(response);
            $('.del'+id).css('display','none');
			$('.del'+id).html('');
			$('.message').html("<label class='fadeoutmsg'>Record Deleted successfully...</label>");
			$(".fadeoutmsg").fadeOut(3000);

        }, error: function (error) {
            console.log(error);
        }
    })
})

