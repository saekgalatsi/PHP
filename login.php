<?php

use GuzzleHttp\Psr7\Header;
$conn = new mysqli("localhost", "root", "", "php");
?>

<?php if(!isset($_SESSION)) { session_start(); } ?>
<?php

if (isset($_POST['name']) and isset($_POST['pass'])) {
    $name = $_POST['name'];
    $pass = $_POST['pass'];


    $stmt = $conn->prepare(query: "SELECT pass FROM user WHERE name = ?");
    $stmt->bind_param("s", $name, );
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($pass, $row["pass"])) {
            echo 'Password is valid!';
            $_SESSION["loged"] = true;
            $_SESSION["username"] = $name;
            header('Location: main.php');
        } else {
            header('Location: main.php');
            echo 'Invalid password.';
        }

    }

}
?>

<form action="login.php" method="POST">
    <h2>LogIn</h2>
    Name: <input type="text" name="name"><br>
    Passowrd: <input type="text" name="pass" type="password"><br>
    <input type="submit">
    <a href="register.php">Register<a />
</form>