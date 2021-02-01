<head>
    <link rel="stylesheet" href="style.css" />

    <script src="script.js"></script>
</head>

<form name="form" action="index.php" method="post" onSubmit="return validateForm();">
    <div class="box">
        <table border="2">

            <tr>
                <th colspan="2" class="heading">User Form</th>
            </tr>

            <tr>
                <td>Enter Name </td>
                <td><input type="text" id="name" name="name"/></td>
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
                    <input type="checkbox" name="game" value="hockey"> Hockey <br>
                    <input type="checkbox" name="game" value="football"> Football<br>
                    <input type="checkbox" name="game" value="badminton"> Badminton<br>
                    <input type="checkbox" name="game" value="cricket"> Cricket<br>
                    <input type="checkbox" name="game" value="vollyball"> Vollyball
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
    </div>
</form>



<?php     
@$name = $_POST['name'];
@$password = $_POST['password'];
@$address = $_POST['address'];
@$game = $_POST['game'];
@$games = implode(",",$game);
@$gender = $_POST['gender'];
@$age = $_POST['age'];
@$file = $_POST['file'];

?>

<table border="1"><tr>
    <th>Name</th>
    <th>password</th>
    <th>address</th>
    <th>game</th>
    <th>gender</th>
    <th>age</th>
    <th>file</th>
    </tr>

<tr>
    <td><?php print $name ?> </td>
    <td><?php print $password ?></td>
    <td><?php print $address ?></td>
    <td><?php print $games ?></td>
    <td><?php print $gender ?></td>
    <td><?php print $age ?></td>
    <td><?php print $file ?></td>
    </tr>                                 
</table>
