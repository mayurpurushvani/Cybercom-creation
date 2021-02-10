function manageCategory() {
    location.replace('list_blog_category.php');
}
function profile() {

}
function logout() {
    location.replace('login.php');

}
function managePost() {
    location.replace('list_blog_post.php');
}

//DELETE CATEGORY
$('.delete').on('click', function () {
    var id = $(this).data('id');
    console.log(id);
    $.ajax({
        url: "./delete_category.php",
        data: { row_id: id, action: "submit" },
        type: 'POST',

        success: function (response) {
            console.log(response);
           
                $('.del' + id).css('display', 'none');
                $('.del' + id).html('');
                $('.message').html("<label class='fadeoutmsg'>Record Deleted successfully...</label>");
                $(".fadeoutmsg").fadeOut(3000);
            
            /*else {
                $('.message').html("<label class='fadeoutmsg'>cannot deleted! First delete category!</label>");
                $(".fadeoutmsg").fadeOut(3000);
            }*/

        }, error: function (error) {
            console.log(error);
        }
    })
})

//DELETE POST
$('.delete1').on('click', function () {
    var id = $(this).data('id');
    console.log(id);
    $.ajax({
        url: "./delete_post.php",
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

