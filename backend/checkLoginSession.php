<?php
    //initial the session
    session_start();
    //if alr login, direct to index.page
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        header("location: ../frontend/index.html");
    }else{
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>