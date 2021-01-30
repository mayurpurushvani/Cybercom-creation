<?php

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {

        if (strlen($name) > 25 || strlen($email) > 50 || strlen($message) > 1000) {
            echo 'Sorry! maxlegth for some fields has been excessed!';
        } else {
            ini_set("SMTP", "ssl://smtp.gmail.com");
            ini_set("smtp_port", "587");
            ini_set('sendmail_from', $email);

            $to = 'mayurpurushvani@gmail.com';
            $subject = 'This is test email';
            $body = 'This is a test email' . "\n\n" . 'Hope you got it..!';
            $headers = 'From: ' . $email;

            if (@mail($to, $subject, $body, $headers)) {
                echo 'Thank you for cotactig us. We will get back to you soon!';
            } else {
                echo 'There was an error while sending an email.';
            }
        }
    } else {
        echo 'All fields are mendetory!';
    }
}

?>

<form action="emailform.php" method="POST">
    Name : <input type="text" name="name"><br><br>
    Email : <input type="email" name="email"><br><br>
    Message : <br> <textarea name="message" rows="6" cols="30"></textarea><br><br>
    <input type="submit" name="Submit">
</form>