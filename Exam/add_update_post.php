<html>
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>   
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    </head>
</html>
<?php

require ('connect.php');
$type = $_POST['type'];

if ($type == "category_update") {
    @$id = mysqli_real_escape_string($con, $_REQUEST['id']);
    @$title = mysqli_real_escape_string($con, $_REQUEST['title']);
    @$content = mysqli_real_escape_string($con, $_REQUEST['content']);
    @$url = mysqli_real_escape_string($con, $_REQUEST['url']);
    @$metaTitle = mysqli_real_escape_string($con, $_REQUEST['metaTitle']);
    @$parentCategory = mysqli_real_escape_string($con, $_REQUEST['parentCategory']);
    @$image = mysqli_real_escape_string($con, $_REQUEST['image']);
 
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d H:i');

    if (!empty($title) && !empty($content) && !empty($url) && !empty($metaTitle) && !empty($image)) {
       
        $update = "UPDATE blog_category SET `parentCategoryId` = '$parentCategory',`title` = '$title' ,`metaTitle` = '$metaTitle', `url` = '$url', `content` = '$content' , `image` = '$image', `updatedAt` = '$date'  WHERE `categoryId`='$id'";
        if (!$con)
            die("not connected");
        else {
            if (mysqli_query($con, $update)) {
                echo "<script>
                alert('category updated!');
                window.location='list_blog_category.php';
                </script>";
            } else {
                echo "<script>
                alert('something goes wrong!');
                window.location='list_blog_category.php'</script>";
            }
        }
    }
}


if ($type == "blog_update") {
    @$id = mysqli_real_escape_string($con, $_REQUEST['id']);
    @$title = mysqli_real_escape_string($con, $_REQUEST['title']);
    @$content = mysqli_real_escape_string($con, $_REQUEST['content']);
    @$url = mysqli_real_escape_string($con, $_REQUEST['url']);
    @$publishedAt = mysqli_real_escape_string($con, $_REQUEST['publishedAt']);
//    @$parentCategory = mysqli_real_escape_string($con, $_REQUEST['parentCategory']);
    @$image = mysqli_real_escape_string($con, $_REQUEST['image']);
 
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d H:i');
    
    if (!empty($title) && !empty($content) && !empty($url) && !empty($publishedAt) && !empty($image)) {
       
        $update = "UPDATE blog_post SET `title` = '$title' , `url` = '$url' ,`content` = '$content' , `image` = '$image', `publishedAt` = '$publishedAt' ,  `updatedAt` = '$date'  WHERE `postId`='$id'";
        if (!$con)
            die("not connected");
        else {
            if (mysqli_query($con, $update)) {
                echo "<script>
                alert('post updated!');
                window.location='list_blog_post.php';
                </script>";
            } else {
                echo "<script>
                alert('something goes wrong!');
                window.location='list_blog_post.php'</script>";
            }
        }
    }
}


if ($type == "blog_insert") {

    @$title = mysqli_real_escape_string($con, $_REQUEST['title']);
    @$content = mysqli_real_escape_string($con, $_REQUEST['content']);
    @$url = mysqli_real_escape_string($con, $_REQUEST['url']);
    @$publishedAt = mysqli_real_escape_string($con, $_REQUEST['publishedAt']);
    @$parentCategory = mysqli_real_escape_string($con, $_REQUEST['parentCategory']);
    @$image = mysqli_real_escape_string($con, $_REQUEST['image']);
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d H:i');

    if (!empty($title) && !empty($content) && !empty($url) && !empty($publishedAt) && !empty($parentCategory) && !empty($image)) {
        
        $insert = "INSERT into blog_post (`title`, `url`,`content`,`image`, `publishedAt`,`createdAt`) values('$title', '$url', '$content', '$image', '$publishedAt','$date')";
        if (!$con)
            die("not connected");
        else {
            if (mysqli_query($con, $insert)) {
                echo "<script> alert('Record inserted!');
                window.location='list_blog_post.php'</script>";
            } else {
                echo "<script> alert('something goes wrong!');
                window.location='add_blog_post.php'</script>";
            }
        }
    }
}



if ($type == "category_insert") {

    @$title = mysqli_real_escape_string($con, $_REQUEST['title']);
    @$content = mysqli_real_escape_string($con, $_REQUEST['content']);
    @$url = mysqli_real_escape_string($con, $_REQUEST['url']);
    @$metaTitle = mysqli_real_escape_string($con, $_REQUEST['metaTitle']);
    @$parentCategory = mysqli_real_escape_string($con, $_REQUEST['parentCategory']);
    @$image = mysqli_real_escape_string($con, $_REQUEST['image']);
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d H:i');
    
    if (!empty($title) && !empty($content) && !empty($url) && !empty($metaTitle) && !empty($parentCategory) && !empty($image)) {
        
        $insert = "INSERT into blog_category (`title`, `url`,`metaTitle`,`content`,`image`,`createdAt`) values('$title', '$url','$metaTitle', '$content', '$image','$date')";
        if (!$con)
            die("not connected");
        else {
            if (mysqli_query($con, $insert)) {
                echo "<script> alert('Record inserted!');
                window.location='list_blog_category.php'</script>";
            } else {
                echo "<script> alert('something goes wrong!');
                window.location='add_blog_category.php'</script>";
            }
        }
    }
}
?>