<!DOCTYPE html>
<html>

<head>
    <title>Contact us</title>
    <link href="CSS/style.css" rel="stylesheet" media="all">

</head>

<body>
    <!-- HEADER INCLUDE -->
    <?php
    include('templates/header.php');

    require_once "connection.php";
    ?>

    <div class="main-content">
        <h1>Read Contacts</h1>
        <hr>
        <?php

        $per_page_record = 5;
        if (isset($_GET["page"])) {
            $page  = $_GET["page"];
        } else {
            $page = 1;
        }

        $start_from = ($page - 1) * $per_page_record;

        $query = "SELECT * FROM contact LIMIT $start_from, $per_page_record";
        $rs_result = mysqli_query($con, $query);
        ?>


        <form action="create_contact.php" method="POST">
            <input type="submit" name="addContact" value="Create Contact">
        </form>

        <div class="message"></div>
        
        <table class="table" id="table1" name="table1">
            <thead class="thead">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Title</th>
                    <th>Created</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $user;
                if (!$con)
                    die("not connected");
                if (@$result = mysqli_query($con, $query)) {
                    while ($row = mysqli_fetch_array($result)) { ?>
                        <tr id="tr"  class="del<?php echo $row['id'];?>">
                            <td><?php echo $row['id']; ?>
                            <td><?php echo $row['name']; ?>
                            <td><?php echo $row['email']; ?>
                            <td><?php echo $row['phone']; ?>
                            <td><?php echo $row['title']; ?>
                            <td><?php echo $row['created']; ?>
                            <td>
                                <form action="update.php" method="post">
                                    <input type="text" style="display:none;" name="type" value="contact_update">
                                    <input type="text" style="display:none;" name="id" value="<?php echo $row['id']; ?>">
                                    <input type="text" style="display:none;" name="name" value="<?php echo $row['name']; ?>">
                                    <input type="text" style="display:none;" name="title" value="<?php echo $row['title']; ?>">
                                    <input type="text" style="display:none;" name="email" value="<?php echo $row['email']; ?>">
                                    <input type="text" style="display:none;" name="phone" value="<?php echo $row['phone']; ?>">
                                    <input type="text" style="display:none;" name="created" value="<?php echo $row['created']; ?>">
                                    <div>
                                        <button class='item-update' title='Update' type="submit">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    
                                </form>
                            </td>
                            <td>
                                <div>
                                    <?php echo "<a href='#' class='delete' data-id='" . $row['id'] . "'><button class='item-delete'><i class='fa fa-trash' aria-hidden='true'></i></button></a>"; ?>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                }
                ?>
            </tbody>
        </table>

        <div class="pagination">
            <?php
            $query = "SELECT COUNT(*) FROM contact";
            $rs_result = mysqli_query($con, $query);
            $row = mysqli_fetch_row($rs_result);
            $total_records = $row[0];

            echo "</br>";
            $total_pages = ceil($total_records / $per_page_record);
            $pagLink = "";

            if ($page >= 2) {
                echo "<a href='contactus.php?page=" . ($page - 1) . "'>  Prev </a>";
            }

            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    $pagLink .= "<a class = 'active' href='contactus.php?page="
                        . $i . "'>" . $i . " </a>";
                } else {
                    $pagLink .= "<a href='contactus.php?page=" . $i . "'>   
                                                " . $i . " </a>";
                }
            };
            echo $pagLink;

            if ($page < $total_pages) {
                echo "<a href='contactus.php?page=" . ($page + 1) . "'>  Next </a>";
            }
            ?>
        </div>
    </div>
    
</body>

<!-- FOOTER INCLUDE -->
<?php include('templates/footer.php'); ?>

</html>