<?php
    $type = $_POST['type'];
    $categoryId = $_POST['categoryId'];
    $url = $_POST['url'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $publishedAt = $_POST['publishedAt'];
    $metaTitle = $_POST['metaTitle'];
    $image = $_POST['image'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Update Category</title>
    <link rel="stylesheet" href="CSS/style.css"/>   
</head>

<body>
    
        <form method="post" action="add_update_post.php">
        <div class="register">
            <h1>Update Category</h1>
            <label class="label">Title</label>
            <input type="text" name="title" value="<?php echo $title ?> "><br>

            <label class="label">Content</label>
            <input type="text" name="content"  value="<?php echo $content ?> "><br>

            <label class="label">URL</label>
            <input type="text" name="url"  value="<?php echo $url ?> "><br>

            <label class="label">Meta Title</label>
            <input type="text" name="metaTitle"  value="<?php echo $metaTitle ?> "><br>

            <label class="label">Parent Category</label>
            <select name="parentCategory">
            <option value=1>Shoe<option>
            </select>
            <br>

            <label class="label">Image</label>
            <input type="file" name="image"  value="<?php echo $image ?> ">
            <br>
            <input type="text" style="display:none;" name="type" value="category_update">
            <input type="text" style="display:none;" name="id" value="<?php echo $categoryId ?>">
            
            <div class="btn">
                <input type="submit" class="sub-100" name="reg_user">
            </div>
        </form>
    </div>
</body>

</html>