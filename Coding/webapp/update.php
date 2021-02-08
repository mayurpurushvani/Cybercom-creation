<?php

$type = $_POST['type'];
$id = $_POST['id'];
$name = $_POST['name'];
$title = $_POST['title'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$created = $_POST['created'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Contacts</title>
    <link href="CSS/style.css" rel="stylesheet" media="all">
</head>

<body>

    <!-- HEADER INCLUDE -->
    <?php include('templates/header.php'); ?>

    <!--MAIN CONTENT -->
    <form action="insert_update_contact.php" id="form" method="POST">
        <div class="main-content">
            <h1>Update Contact #<?php echo $id ?></h1>
            <hr>
            <table class="table-1">
                <thead class="thead-1">
                    <th>ID</th>
                    <th>Name</th>
                </thead>

                <tbody>
                    <td>
                        <input type="text" name="id" value="<?php echo $id ?>" disabled="disabled">
                    </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $name ?>">
                    </td>
                </tbody>
                <thead class="thead-1">
                    <th>Email</th>
                    <th>Phone</th>
                </thead>
                <tbody>
                    <td>
                        <input type="email" name="email" value="<?php echo $email ?>">
                    </td>
                    <td>
                        <input type="number" name="phone" value="<?php echo $phone ?>">
                    </td>
                </tbody>
                <thead class="thead-1">
                    <th>Title</th>
                    <th>Created</th>
                </thead>
                <tbody>
                    <td>
                        <input type="text" name="title" value="<?php echo $title ?>">
                    </td>
                    <td>
                        <input type="datetime-local" name="created" value="<?php echo date('Y-m-d\TH:i:s', strtotime($created)); ?>">
                    </td>
                </tbody>
            </table>
            <input type="text" style="display:none;" name="type" value="contact_update">
            <input type="text" style="display:none;" name="id" value="<?php echo $id ?>">
            <input type="submit" name="updateContact" value="Update">
    </form>

    </div>
</body>
<!-- FOOTER INCLUDE -->
<?php include('templates/footer.php'); ?>
</html>