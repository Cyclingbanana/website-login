<?php

session_start();

$name = $_POST["name"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$hash = password_hash($password, PASSWORD_DEFAULT);

if (!empty($_POST)) {

    $conn = new mysqli("servername", "username", "password", "database_name"); /* DO: replace arguments with appropriate details */

    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (name, email, username, password) VALUES ('$name', '$email', '$username', '$hash')";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo "An account has been created";
}
