<!DOCTYPE html>
<html>

<head>
    <title>Add Contacts</title>
    <link href="CSS/style.css" rel="stylesheet" media="all">


</head>

<body>

    <!-- HEADER INCLUDE -->
    <?php include('templates/header.php'); ?>

    <!--MAIN CONTENT -->
    <form action="insert_update_contact.php" method="POST" id="form" name="insertForm">
        <div class="main-content">
            <h1>Create Contact</h1>
            <hr>

            <table class="table-1">

                <thead class="thead-1">
                    <th>ID</th>
                    <th>Name</th>
                </thead>

                <tbody>
                    <td>
                        <input type="text" name="id" value="auto" disabled="disabled">
                    </td>
                    <td>
                        <input type="text" name="name">
                    </td>
                </tbody>
                <thead class="thead-1">
                    <th>Email</th>
                    <th>Phone</th>
                </thead>
                <tbody>
                    <td>
                        <input type="email" name="email">
                    </td>
                    <td>
                        <input type="number" title="value must be 10" name="phone">
                    </td>
                </tbody>
                <thead class="thead-1">
                    <th>Title</th>
                    <th>Created</th>
                </thead>
                <tbody>
                    <td>
                        <input type="text" name="title">
                    </td>
                    <td>
                        <input type="datetime-local" name="created">
                    </td>
                </tbody>
            </table>


            <input type="text" style="display:none;" name="type" value="contact_insert">
            <input type="submit" name="addContact" value="Create">
    </form>
    </div>
    
</body>
<!-- FOOTER INCLUDE -->
<?php include('templates/footer.php'); ?>
</html>