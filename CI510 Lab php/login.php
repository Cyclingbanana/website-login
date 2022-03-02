<?php

session_start();

if (!empty($_POST)) {
    $conn = new mysqli("ih226.brighton.domains", "ih226_db_user", "j?fRdiZ#tJNk", "ih226_ci536");
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT password FROM users";
    $result = mysqli_query($conn, $sql);

    while ($record = mysqli_fetch_assoc($result)) {
        $hash = $record["password"];

        if (password_verify($_POST['password'], $hash)) {
            $_SESSION["status"] = "loggedin";
            $_SESSION["username"] = $_POST['username'];
            header("Location: http://ih226.brighton.domains/confidential_info.php");
            exit();
        }

    }
}
mysqli_close($conn);
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Log-in Page</title>
</head>

<body>
    <form action="" method="post">
        username <input type="text" name="username">
        <br>
        password <input type="text" name="password">
        <br>
        <input type="submit" value="submit">
    </form>
</body>

</html>