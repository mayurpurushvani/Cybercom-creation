<?php
    $type = $_POST['type'];
    $postId = $_POST['postId'];
    $url = $_POST['url'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $publishedAt = $_POST['publishedAt'];
    $image = $_POST['image'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Post</title>
    <link rel="stylesheet" href="CSS/style.css" />
</head>

<body>

    <form method="post" action="add_update_post.php">
        <div class="register">
            <h1>Add New Blog Post</h1>
            <label class="label">Title</label>
            <input type="text" name="title" value="<?php echo $title ?>"><br>

            <label class="label">Content</label>
            <input type="text" name="content" value="<?php echo $content ?>"><br>

            <label class="label">URL</label>
            <input type="text" name="url" value="<?php echo $url ?> "><br>

            <label class="label">Published At</label>
            <input type="datetime-local" name="publishedAt" value="<?php  echo date('Y-m-d\TH:i:s', strtotime($publishedAt)); ?>"><br>

            <label class="label">Category</label>
            <select name="parentCategory">
                <option value=1>shoe</option>
            </select>
            <br>

            <label class="label">Image</label>
            <input type="file" name="image" value="<?php echo $image ?>">
            <br>

            <input type="text" style="display:none;" name="type" value="blog_update">
            <input type="text" style="display:none;" name="id" value="<?php echo $postId ?>">
            <div class="btn">
                <input type="submit" class="sub-100" name="reg_user">
            </div>
    </form>
    </div>
</body>

</html>