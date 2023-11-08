<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
<?php

        require_once "database/conn.php";

        $sql = "SELECT name, email, city, gender FROM formdata";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th>Name</th><th>Email</th><th>City</th><th>Gender</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['city'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No data found in the database.";
        }

        mysqli_close($conn); 
?>
</body>
</html>


