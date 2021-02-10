<?php include('connect.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Category</title>
    <link rel="stylesheet" href="CSS/style.css"/>   
</head>

<body>
    
        <form method="post" action="add_update_post.php">
        <div class="register">
            <h1>Add new Category</h1>
            <label class="label">Title</label>
            <input type="text" name="title"><br>

            <label class="label">Content</label>
            <input type="text" name="content" ><br>

            <label class="label">URL</label>
            <input type="text" name="url" ><br>

            <label class="label">Meta Title</label>
            <input type="text" name="metaTitle" ><br>

            <label class="label">Parent Category</label>
            <select name="parentCategory">
            <option value=1>Shoe<option>
            </select>
            <br>

            <label class="label">Image</label>
            <input type="file" name="image" value="Upload Image">
            <br>
            <input type="text" style="display:none;" name="type" value="category_insert">
            <input type="text" style="display:none;" name="id" value="<?php echo $_SESSION['id'] ?>">
            
            <div class="btn">
                <input type="submit" class="sub-100" name="reg_user">
            </div>
        </form>
    </div>
</body>

</html>