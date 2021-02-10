<?php include('connect.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
    <link rel="stylesheet" href="CSS/style.css"/>
</head>

<body>
    
        <form method="post" action="db_register.php">
        <div class="register">
            <h1>Register</h1>
            <label class="label">Prefix</label>
            <select name="prefix">
                <option value=0>Prefix</option>
                <option value=1>Mr.</option>
                <option value=2>Ms.</option>
                <option value=3>Mrs.</option>
            </select>
            <br>
            <label class="label">First Name</label>
            <input type="text" name="firstName"><br>

            <label class="label">Last Name</label>
            <input type="text" name="lastName" ><br>

            <label class="label">Email</label>
            <input type="email" name="email" ><br>

            <label class="label">Mobile Number</label>
            <input type="tel" name="mobile" ><br>

            <label class="label">Password</label>
            <input type="password" name="password"><br>
            
            <label class="label">Confirm password</label>
            <input type="password" name="cpassword"><br>

            <label class="label">Information</label>
            <textarea name="information" rows="6" cols="30"></textarea><br>
            
            <input type="checkbox" name="terms">
            <label class="label-chk">Hereby, I Accept Terms & Conditions.</label>
            <div class="btn">
                <input type="submit" class="sub" name="reg_user">
            </div>
        </form>
    </div>
</body>

</html>