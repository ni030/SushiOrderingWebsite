<?php
    session_start();
    unset($_SESSION["id"]);
    unset($_SESSION["name"]);
    $_SESSION["loggedin"] = FALSE;
    header("Location:../frontend/login.php");
?>