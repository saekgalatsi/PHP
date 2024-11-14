<?php

use GuzzleHttp\Psr7\Header;
$conn = new mysqli("localhost", "root", "", "php");
?>

<?php if (!isset($_SESSION)) {
    session_start();
} ?>

<?php
if (isset($_POST['name'])) {
    $name = $_POST['name'];

    $stmt = $conn->prepare(query: "UPDATE user SET name = ? WHERE name = ? ");
    $stmt->bind_param("ss", $name, $_SESSION["username"]);
    $stmt->execute();
    $_SESSION["username"] = $name;
    echo $_SESSION["username"];
    header('Location: main.php');
}
?>

<form action="pannel.php" method="POST">
    <h2>ChangeName</h2>
    NewName: <input type="text" name="name"><br>
    <input type="submit">
</form>