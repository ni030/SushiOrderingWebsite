<?php
    session_start();
    unset($_SESSION["id"]);
    $_SESSION["loggedin"] = FALSE;
    header("Location:../frontend/login.php");
?>