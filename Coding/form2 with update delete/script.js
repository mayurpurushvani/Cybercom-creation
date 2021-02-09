/*
function validateForm() {
    let fname = document.forms["form"]["fname"];
    let password = document.forms['form']['password'];
    let male = document.form.gender[0];
    let female = document.form.gender[1];
    let address = document.forms['form']['address'];
    let day = document.forms['form']['date'];
    let month = document.forms['form']['month'];
    let year = document.forms['form']['year'];
    
    let game = document.getElementsByName("game[]");
    let chkHockey = game[0];
    let chkfootall = game[1];
    let chkcricket = game[2];
    let chkvollyball = game[3];

    let married = document.form.marital[0];
    let unmarried = document.form.marital[1];
    let terms = document.forms['form']['terms'];

    if (fname.value == "") {
        window.alert("Please enter your first name.");
        fname.focus();
        return false;
    }
    if (password.value == "") {
        window.alert("Please enter password.");
        password.focus();
        return false;
    }
    if (!male.checked && !female.checked) {
        alert('You must select male or female');
        return false;
    }
    if (address.value == "") {
        window.alert("Please enter address.");
        address.focus();
        return false;
    }
    if (day.value == "Day" || month.value == "Month" || year.value == "Year") {
        window.alert("Please select proper Date of Birth.");
        day.focus();
        return false;
    }
    if (!chkHockey.checked && !chkcricket.checked && !chkfootall.checked && !chkvollyball.checked) {
        alert('Please select at least one Game.');
        chkHockey.focus();
        return false;
    }
    if (!married.checked && !unmarried.checked) {
        alert('You must select marital status!');
        married.focus();
        return false;
    }
    if (!terms.checked) {
        window.alert("Please agree to the Terms");
        terms.focus();
        return false;
    }

    /*
        if (!chkHockey.checked && !chkcricket.checked && !chkfootall.checked && !chkvollyball.checked && !chkbadminton.checked) {
            alert('Please select at least one Game.');
            chkHockey.focus();
            return false;
        }
    
        if (!male.checked && !female.checked) {
            alert('You must select male or female');
            return false;
        }
        if (age.selectedIndex < 1) {
            alert("Please enter your Age.");
            age.focus();
            return false;
        }
        if (!allowedExtensions.exec(filePath)) {
            alert('Invalid file type');
            fileInput.value = '';
            return false;
        }
    
}
*/




$(document).ready(function () {
    $('#form').validate({
        rules: {
            fname: {
                required: true,
            },
            password: {
                required: true,
                rangelength: [8, 10],
            },
            gender: {
                required: true,
            },
            address: {
                required: true,
            },
            month: {
                required: {
                    depends: function (element) {
                       if($("#month").val() == '0') {
                           $('#month').val('');
                       }
                       return true;
                    }
                }
            },
            date: {
                required: {
                    depends: function (element) {
                       if($("#date").val() == '0') {
                           $('#date').val('');
                       }
                       return true;
                    }
                }
            },
            year: {
                required: {
                    depends: function (element) {
                       if($("#year").val() == '0') {
                           $('#year').val('');
                       }
                       return true;
                    }
                }
            },
            marital: {
                required: true,
            },
            "game[]": {
                required: true,
            }
        },
        messages: {
            fname: {
                required: '<br>Please enter Name.',
            },
            password: {
                required: '<br>Please enter Email Address.',
                rangelength: '<br>Password must be between 8 to 10 digit',
            },
            gender: {
                required: 'Please select gender.',
            },
            address: {
                required: '<br>Please enter address',
            },
            month: {
                required: '<br>Please select a month.',
            },
            year: {
                required: '<br>Please select a year.',
            },
            date: {
                required: '<br>Please select a date.',
            },
            marital: {
                required: '<br>Please select a marital status.',
            },
            "game[]": {
                required: '<br>Please select at least one game.',
            }
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
            $('.del' + id).css('display', 'none');
            $('.del' + id).html('');
            $('.message').html("<label class='fadeoutmsg'>Record Deleted successfully...</label>");
            $(".fadeoutmsg").fadeOut(3000);

        }, error: function (error) {
            console.log(error);
        }
    })
})

