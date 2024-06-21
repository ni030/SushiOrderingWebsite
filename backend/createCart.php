<?php
    require_once("connection.php");
    $email = $_GET["email"];
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();

    $userid = $row["guid"];
    echo $userid;

    $sql2 = "INSERT INTO `cart`(`userID`) VALUES ('$userid')";

    if ($conn->query($sql2) === TRUE) {
        header("Location: ../frontend/login.php?signup=success");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    ?>