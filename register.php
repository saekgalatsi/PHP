<?php

use Symfony\Component\Validator\Constraints\Length;
$conn = new mysqli("localhost", "root", "", "php");
?>
<?php if(!isset($_SESSION)) { session_start(); } ?>
<?php
    if (isset($_POST['name']) and isset($_POST['pass1'])and isset($_POST['pass2'])) {
        $name = $_POST['name'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];


        if (strlen($name) < 6) {
            echo 'Password Must be 6-32 ';
            return;
        }
        if (strlen(string: $name) > 32) {
            echo 'Password Must be 6-32 ';
            return;
        }


        if ($pass1 == $pass2) {
            $db_pass = password_hash($pass1, PASSWORD_DEFAULT);
            $stmt = $conn->prepare(query: "INSERT INTO user (name, pass) VALUES (?, ?)");
            $stmt->bind_param("ss", $name, $db_pass);
            $stmt->execute();
            header('Location: main.php');
        }
    }
?>

<form action="register.php" method="POST" >
    <h2>Rgister</h2>
    Name: <input type="text" name="name"><br>
    Passowrd: <input type="text" name="pass1" id="pass1" type ="password"><br>
    Retype Passowrd: <input type="text" name="pass2" id="pass2" type ="password"><br>
    <input type="submit">
    <a href="login.php">Log In<a/>
</form> 