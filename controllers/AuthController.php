<?php

//sesi 2
$is_login = false;
session_start();
require_once "connection.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // var_dump($username);
    // var_dump($password);
    //$username === "admin" && $password === "admin"
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = "SELECT * FROM users WHERE username = '$username'  AND password = '$password';";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        echo "Login Success";
        $row = $result->fetch_assoc(); //jadiin array jadi bisa diambil
        //sesi3
        $_SESSION["is_login"] = true;
        $_SESSION["username"] = $row["username"];
        $_SESSION["role"] = $row["role"];
        $_SESSION["fullname"] = $row["fullname"];
        header("Location:../messages.php");
    } else {
        echo "Login Failed";
        header("Locations:../login.php");
    }
}



?>
