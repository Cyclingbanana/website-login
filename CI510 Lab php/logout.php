<?php

session_start();
session_destroy();
header("location:http://ih226.brighton.domains/login.php");

exit();