<?php

session_start();

if (!isset($_SESSION["status"])) {
    header("Location:http://ih226.brighton.domains/login.php"); /* DO: replace "login.php" url with your own */
    exit();
}

$conn = new mysqli("servername", "username", "password", "database_name"); /* DO: replace arguments with appropriate details */

if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}

$username = $_SESSION["username"]; /* Had to create a session username in login.php to make this work (this is the solution to Week 11 lab problem) */
$sql = "SELECT users.username FROM users 
            INNER JOIN user_role ON users.username = user_role.username 
            INNER JOIN roles on user_role.roleid = roles.roleid WHERE users.username = '$username'";
$result = mysqli_query($conn, $sql);
$perm = mysqli_num_rows($result);

if ($perm == 1) {
    echo "This is the webpage that contains the exam solutions
        and should not be access by users that don't have the role staff";
} else {
    echo  "You are not authorised to view this page";
}

$conn->close();
