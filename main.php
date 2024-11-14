<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>


<?php if(!isset($_SESSION)) { session_start(); } ?>

<?php

if (isset($_GET['logout'])) {
    session_unset(); 
    session_destroy(); 
    header('Location: main.php');
}
if (!isset($_SESSION['loged'])) { $_SESSION["loged"] = false;}

echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

if (isset($_SESSION['username'])) {
    echo "Logged In: " . $_SESSION["username"];
    echo "<a href='main.php?logout=true'>Log Out</a>";
    include 'pannel.php';
} else {
    include 'login.php';
}

// include 'register.php';

?>


<!-- 
<table border="1">
    <thead>
        <tr>
            <th scope="col">NAME</th>
            <th scope="col">AGE</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT name, age FROM user";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            foreach ($result as $row) {
                $name = $row["name"];
                $age = $row["age"];
                echo
                    "<tr>
                    <th scope='row'>" . $name . "</th>
                    <td>" . $age . "</td>
                </tr>";
            }
        }


        ?>
    </tbody>
</table> -->