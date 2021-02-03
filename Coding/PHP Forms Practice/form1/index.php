<head>
<meta http-equiv="Cache-control" content="no-cache">
    <title>Form 1</title>
    <link rel="stylesheet" href="style.css" />
    <script src="script.js"></script>
</head>

<form name="form" action="index.php" method="post" onSubmit="return validateForm();">
    <table border="2">

        <tr>
            <th colspan="2" class="heading">User Form</th>
        </tr>

        <tr>
            <td>Enter Name </td>
            <td><input type="text" id="name" name="name" /></td>
        </tr>

        <tr>
            <td>Enter Password </td>
            <td><input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" /></td>
        </tr>

        <tr>
            <td>Enter Address </td>
            <td><textarea rows="3" name="address" id="address" cols="30"></textarea></td>
        </tr>

        <tr>
            <td>Select Game </td>
            <td>
                <input type="checkbox" name="game[]" id="hockey" value="hockey"> Hockey <br>
                <input type="checkbox" name="game[]" id="football" value="football"> Football<br>
                <input type="checkbox" name="game[]" id="badminton" value="badminton"> Badminton<br>
                <input type="checkbox" name="game[]" id="cricket" value="cricket"> Cricket<br>
                <input type="checkbox" name="game[]" id="vollyball" value="vollyball"> Vollyball
            </td>
        </tr>

        <tr>
            <td>Gender</td>
            <td>
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="female">Female
            </td>
        </tr>

        <tr>
            <td>Select your Age</td>
            <td>
                <select name="age">
                    <option>Select</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="60">60</option>
                    <option value="70">70</option>
                    <option value="80">80</option>
                    <option value="90">90</option>
                    <option value="100">100</option>
                </select>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <div class="file">
                    <input type="file" id="file" name="file">
                </div>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <div class="btn">
                    <input type="reset" name="reset">
                    <input type="submit" name="submit">
                </div>
            </td>
        </tr>

    </table>
</form>


<table border="1" name="table">
    <tr>
        <th>Name</th>
        <th>password</th>
        <th>address</th>
        <th>game</th>
        <th>gender</th>
        <th>age</th>
        <th>file</th>
    </tr>


    <?php

    require('connect.php');

    @$name = $_POST['name'];
    @$password = md5($_POST['password']);
    @$address = $_POST['address'];
    @$game = $_POST['game'];
    @$games = implode(",", $game);
    @$gender = $_POST['gender'];
    @$age = $_POST['age'];
    @$file = $_POST['file'];

    /*INSERT DATA REGION*/
    if (isset($_POST['submit'])) {
        if (isset($name) && isset($password) && isset($address) && isset($games) && isset($gender) && isset($age) && isset($file)) {
            if (!empty($name) && !empty($password) && !empty($address) && isset($games) && !empty($gender) && !empty($age) && !empty($file)) {
                $query = "INSERT into `form1`(`name`,`password`,`address`,`game`,`gender`,`age`,`file`) values ('$name', '$password', '$address', '$games', '$gender', '$age', '$file')";
                $res = mysqli_query($con, $query);
                if (!$res) {
                    echo '<script> alert("Something goes wrong!") </script>';
                    echo "<script>window.location.replace('http://localhost/cybercom-creation/Excercise/2021-02-01/form1/');</script>";
                }
                if ($res) {
                    echo '<script> alert ("Record inserted successfully!") </script>';
                    echo "<script>window.location.replace('http://localhost/cybercom-creation/Excercise/2021-02-01/form1/');</script>";
                }
            }
        }
    }

    /*INSERT DATA REGION OVER*/

    /*RETRIVE DATA REGION*/

    $query = "SELECT `name`,`password`,`address`,`game`,`gender`,`age`,`file` from `form1`";
    if ($query_run = mysqli_query($con, $query)) {
        if (mysqli_num_rows($query_run) == NULL) {
            echo '<script> alert ("No result found!")</script>';
        } else {
            while ($query_row = mysqli_fetch_assoc($query_run)) {
                $name = $query_row['name'];
                $password = $query_row['password'];
                $address = $query_row['address'];
                $game = $query_row['game'];
                $gender = $query_row['gender'];
                $age = $query_row['age'];
                $file = $query_row['file'];
                echo ("<tr>");
                echo ("<td>$name</td>");
                echo ("<td>$password</td>");
                echo ("<td>$address</td>");
                echo ("<td>$game</td>");
                echo ("<td>$gender</td>");
                echo ("<td>$age</td>");
                echo ("<td>$file</td>");
                echo ("</tr>");
            }
        }
    } else {
        echo mysqli_error('Error!');
    }



    /*RETRIVE DATA REGION OVER*/

    ?>
</table>