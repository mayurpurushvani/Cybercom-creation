<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="CSS/style.css" />
</head>

<body>
    <form action="db_login.php" method="POST">
        <div class="login">
            <h1>LOGIN</h1>
            <label>Email</label><br>
            <input type="email" name="email"><br><br>
            <label>Password</label><br>
            <input type="password" name="password1"><br><br>
            <input class="sub" type="submit" name="login" value="LOGIN">
    </form>
    <form action="register.php" method="POST">
        <input class="sub" type="submit" name="register" value="REGISTER">
    </form>

    </div>
</body>

</html>