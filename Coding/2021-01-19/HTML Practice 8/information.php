
<?php
        ' <link rel="stylesheet" href="style.css"/> ';
        
        $fName=$_POST['fName'];
        $lName=$_POST['lName'];
        $day = $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $securityAnswer = $_POST['securityAnswer'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zipCode = $_POST['zipCode'];
        $phone = $_POST['phone'];


echo'
        <table border = "1">
            <tr>
                <th colspan= "2">Personal Information</th>
            </tr>
            <tr>
                <td>First Name</td>
                <td>'.$fName.'</td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td>'.$day.'-'.$month.'-'.$year.'</td>
            </tr>
            <tr>
                <th colspan="2">Account Information</th>
            </tr>
            <tr>
                <td>Email</td>
                <td>'.$email.'</td>
            </tr>
            <tr>
                <td>Password</td>
                <td>'.$password.'</td>
            </tr>
            <tr>
                <th colspan="2">Contact Information</th>
            </tr>
            <tr>
                <td>Phone</td>
                <td>'.$phone.'</td>
            </tr>


        </table>';
?>

