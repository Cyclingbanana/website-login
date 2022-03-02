<?php

session_start();

if (!isset($_SESSION["status"])) {
    header("Location: http://ih226.brighton.domains/login.php");
    exit();
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Confidential Webpage</title>
</head>

<body>
    <p></p>
    <?php echo "One of the questions in the exam will be about the top 10 web application security risks." ?>
    <br>
    <a href="solutions.php">Solutions</a>
    <br>
    <a href="logout.php">Log Out</a>
</body>

</html>