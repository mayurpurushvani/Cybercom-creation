<!DOCTYPE html>
<html>

<head>
    <title>Blog Posts</title>
</head>

<body>

    <!-- HEADER INCLUDE -->
    <?php
    include('template/header.php');
    require_once "connect.php";
    ?>

    <!--MAIN CONTENT -->
    <div class="main-content">
        <h1>Blog Posts</h1>
        <form action="add_blog_post.php" method="POST">
            <input class="btn-100" type="submit" name="addPost" value="Add Blog Post">
        </form>

        <div class="message"></div>

        <table class="table" id="table1" name="table1">
            <thead class="thead">
                <tr>
                    <th>Post Id</th>
                    <th>Category Name</th>
                    <th>Title</th>
                    <th>Published At</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $user;
                if (!$con) {
                    die("not connected");
                }
                $query = "SELECT * FROM `blog_post` where `userId` = `userId`";
                if (@$result = mysqli_query($con, $query)) {
                    while ($row = mysqli_fetch_array($result)) { ?>
                        <tr id="tr" class="del<?php echo $row['postId']; ?>">
                            <td><?php echo $row['postId']; ?>
                            <td><?php echo $row['url']; ?>
                            <td><?php echo $row['title']; ?>
                            <td><?php echo $row['publishedAt']; ?>
                            <td>
                                <form action="update_blog_post.php" method="post">
                                    <input type="text" style="display:none;" name="type" value="post_update">
                                    <input type="text" style="display:none;" name="postId" value="<?php echo $row['postId']; ?>">
                                    <input type="text" style="display:none;" name="url" value="<?php echo $row['url']; ?>">
                                    <input type="text" style="display:none;" name="title" value="<?php echo $row['title']; ?>">
                                    <input type="text" style="display:none;" name="content" value="<?php echo $row['content']; ?>">
                                    <input type="text" style="display:none;" name="publishedAt" value="<?php echo $row['publishedAt']; ?>">
                                    <input type="text" style="display:none;" name="image" value="<?php echo $row['image']; ?>">
                                    <div>
                                        <button class='item-update' title='Update' type="submit">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                    </div>

                                </form>
                            </td>
                            <td>
                                <div>
                                    <?php echo "<a href='#' class='delete1' data-id='" . $row['postId'] . "'><button class='item-delete'><i class='fa fa-trash' aria-hidden='true'></i></button></a>"; ?>
                                </div>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>


    </div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="JS/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
</html>