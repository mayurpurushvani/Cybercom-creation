<html>

<head>

    <title>HTML Practice 8</title>

</head>
<link rel="stylesheet" href="style.css" />

<body>


    <?php

    $nameErr = $emailErr = $genderErr = $websiteErr = "";
    $name = $email = $gender = $class = $course = $subject = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if (empty($_POST["course"])) {
            $course = "";
        } else {
            $course = test_input($_POST["course"]);
        }

        if (empty($_POST["class"])) {
            $class = "";
        } else {
            $class = test_input($_POST["class"]);
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }

        if (empty($_POST["subject"])) {
            $subjectErr = "You must select 1 or more";
        } else {
            $subject = $_POST["subject"];
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="form1">

        <div class="box">
            <div class="alig">
                <h4 class="heading">Absolute classes registration</h4>
                <p class="star">* Required field.</p>
                <p class="star">* You must agree to terms</p>
            </div>

            <div class="align">
                <label class="label-100">Name :</label>
                <input type="text" class="input" name="name" />
                <label class="star">*</label>
            </div>

            <div class="align">
                <label class="label-100">Email :</label>
                <input type="email" class="input" name="email" />
                <label class="star">*</label>
            </div>
            <div class="align">
                <label class="label-100">Time : </label>
                <input type="text" class="input" name="course"><?php echo $websiteErr; ?></input>
            </div>
            <div class="align">
                <label class="label-100">Classes :</label>
                <textarea name="class" rows="5" class="input" cols="40"></textarea>
            </div>
            <div class="align">
                <label class="label-100">Gender :</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label>
                <input type="radio" id="male" name="gender" value="male">
                <label for="female">Male</label>
                <label class="star">*</label>
            </div>

            <div class="align">
                <label class="label-100">Select :</label>
                <select class="select" name="subject[]" size="4" multiple>
                    <option value="Android">Android</option>
                    <option value="Java">Java</option>
                    <option value="C#">C#</option>
                    <option value="Data Base">Data Base</option>
                    <option value="Hadoop">Hadoop</option>
                    <option value="VB script">VB script</option>
                </select>
            </div>

            <div class="align">
                <label class="label-100">Agree :</label>
                <input type="checkbox" class="select" name="checked" value="1">
                <?php if (!isset($_POST['checked'])) { ?>
                    <span class="error">* <?php echo "You must agree to terms"; ?></span>
                <?php } ?>
            </div>

            <input type="submit" name="submit" id="submit" value="Submit" class="btn" />

            <!--            <div class="align">
                <h3>Your given values are as :</h3>
            </div>

            <div class="align">
                <label class="label-100">Your name is :</label>
                <label class="input" name="name">abcd</label>
            </div>
            <div class="align">
                <label class="label-100">Your email is :</label>
                <label class="input" name="email">abcd</label>
            </div>
            <div class="align">
                <label class="label-100">Your class time at :</label>
                <label class="input" name="time">abcd</label>
            </div>
            <div class="align">
                <label class="label-100">Your class info :</label>
                <label class="input" name="info">abcd</label>
            </div>
            <div class="align">
                <label class="label-100">Your gender is :</label>
                <label class="input" name="gender">abcd</label>
            </div>
-->
            <?php
            echo "<h2>Your given values are as :</h2>";
            echo ("<p>Your name is : $name</p>");
            echo ("<p> your email address is : $email</p>");
            echo ("<p>Your class time at :  $course</p>");
            echo ("<p>your class info : $class </p>");
            echo ("<p>your gender is : $gender</p>");

            for ($i = 0; $i < @count($subject); $i++) {
                echo (@$subject[$i] . " ");
            }
            ?>

        </div>
    </form>


</body>

</html>