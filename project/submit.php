<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = $_POST["fullname"];
    $email = strtolower($_POST["email"]);
    $city = $_POST["city"];
    $gender = $_POST["gender"];

    require_once "database/conn.php";
    require_once "database/function.php";

    $cities = [
        "Mumbai",
        "Pune",
        "Nagpur",
        "Thane",
        "Nashik",
        "Aurangabad",
        "Solapur",
        "Kolhapur",
        "Amravati",
        "Akola",
        "Jalgaon",
        "Latur",
        "Sangli",
    ];



    if (!validate_data($fullname, $email, $city)) {
        echo"error";
        exit();
    }

    if (!searchCity($city, $cities)) {
        echo "city-not-found";
        exit();
    }

    $city = strtolower($city);
    $city = ucwords($city);


    $sql = "INSERT INTO formdata (name, email, city, gender) VALUES ('$fullname', '$email', '$city', '$gender')";

    if (mysqli_query($conn, $sql)) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
