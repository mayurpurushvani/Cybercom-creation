<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title Page-->
    <title>Login</title>

    <!-- Bootstrap CSS-->
    <link href="../../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../../css/theme.css" rel="stylesheet" media="all">

</head>

<?php

//$admin = $this->getAdmin();

?>
<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="../../images/icon/questecom.png" style="width:250px;">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="#<?php //echo $this->getUrl()->getUrl('login', 'Admin'); ?>" method="post">
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input class="au-input au-input--full" name="userName" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Main JS-->
    <script src="../../js/main.js"></script>

</body>

</html>
<!-- end document-->