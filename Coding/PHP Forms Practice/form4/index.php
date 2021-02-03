<head>
    <title>Form 4</title>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css" />
</head>

<form action="index.php" method="POST" name="form" onSubmit="return validateForm();">
    <div class="container">
        <div class="box">
            <div class="heading">
                <label class="label-100">Contact Us!</label>
            </div>

            <input type="text" name="name" placeholder="Name..." class="input">
            <input type="email" name="email" placeholder="Email..." class="input">
            <input type="text" name="subject" placeholder="Subject..." class="input">
            <textarea name="message" rows="6" cols="30" placeholder="Message..."></textarea>

            <input type="submit" class="sub" name="submit" value="SEND MESSAGE">
        </div>
    </div>


</form>

<table border="1" name="table">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Message</th>
    </tr>

    <?php
    require('connect.php');
    @$name = $_POST['name'];
    @$email = $_POST['email'];
    @$subject = $_POST['subject'];
    @$message = $_POST['message'];

    /*INSERT DATA REGION*/
    if (isset($_POST['submit'])) {
        if (isset($name) && isset($email) && isset($subject) && isset($message)) {
            if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
                $sql = "INSERT into `form4` (`name`, `email`, `subject`, `message`) values ('$name', '$email', '$subject', '$message')";
                $success = mysqli_query($con, $sql);
                if (!$success) {
                    echo "<script> alert('Something goes wrong!') </script>";
                    echo "<script>window.location.replace('http://localhost/cybercom-creation/Excercise/2021-02-01/form4/');</script>";
                }
                if ($success) {
                    echo "<script> alert ('Thank you for contacting us! We\'ll get back to you soon!') </script>";
                    echo "<script>window.location.replace('http://localhost/cybercom-creation/Excercise/2021-02-01/form4/');</script>";
                }
            }
        }
    }

    /*INSERT DATA REGION OVER*/

    /*RETRIVE DATA REGION*/
    $query1 = "SELECT `name`,`email`,`subject`,`message` from `form4`";
    if ($query_run1 = @mysqli_query(@$con, $query1)) {
        if (mysqli_num_rows($query_run1) == NULL) {
            echo '<script> alert ("No result found!")</script>';
        } else {
            while ($query_row = mysqli_fetch_assoc($query_run1)) {
                $name = $query_row['name'];
                $email = $query_row['email'];
                $subject = $query_row['subject'];
                $message = $query_row['message'];
                echo ("<tr>");
                echo ("<td>$name</td>");
                echo ("<td>$email</td>");
                echo ("<td>$subject</td>");
                echo ("<td>$message</td>");
                echo ("</tr>");
            }
        }
    } else {
        echo ('Error!');
    }
    /*RETRIVE DATA REGION OVER*/

    ?>

</table>