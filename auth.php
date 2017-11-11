<?php

include("connection/db.php");
include("connection/start.php");

if(isset($_SESSION["username"])) {
    $sql = "UPDATE users SET lastactive=NOW() WHERE username='". mysqli_real_escape_string($con, $_SESSION['username'])."'";
    mysqli_query($con, $sql);
} else { 
    header("Location: logginn.php");
    exit(); 
}

?>