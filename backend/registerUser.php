<?php
require_once("connection.php");
$email_error_message = null;

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "Register Now")) {

    //check empty input(s)
    if (empty($_POST["firstName"]) || empty($_POST["lastName"]) || empty($_POST["email"]) || empty($_POST["mobileNum"]) || empty($_POST["password"]) || empty($_POST["birthday"])) {
        echo "Have null value(s).";
    } else {
        //check unique for email and mobileNum
        if ($stmt = $conn->prepare("SELECT guid FROM user WHERE email = ?")) {
            $stmt->bind_param('s', $_POST["email"]);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                header("Location: ../frontend/register.php?signup=email");
                exit();
            }
            $stmt->close();
        }

        if ($stmt2 = $conn->prepare("SELECT guid FROM user WHERE mobileNum = ?")) {
            $stmt2->bind_param('i', $_POST["mobileNum"]);
            $stmt2->execute();
            $stmt2->store_result();

            if ($stmt2->num_rows > 0) {
                header("Location: ../frontend/register.php?signup=phone");
                exit();
            }
            $stmt2->close();
        }

        $firstName = $_POST["firstName"];
        $lastName = $_POST['lastName'];
        $mobileNum = $_POST['mobileNum'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $birthday = $_POST['birthday'];


        // Password Encryption
        // Store the cipher method
        $ciphering = "AES-128-CTR";

        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        // Non-NULL Initialization Vector for encryption
        $encryption_iv = '0810071600151260';

        // Store the encryption key
        $encryption_key = "sushiorderweb";

        // Use openssl_encrypt() function to encrypt the data
        $encryption = openssl_encrypt(
            $password,
            $ciphering,
            $encryption_key,
            $options,
            $encryption_iv
        );

        $sql = "INSERT INTO `user`(`firstName`, `lastName`, `mobileNum`, `email`, `password`, `birthday`) VALUES ('$firstName', '$lastName', '$mobileNum', '$email', '$encryption', '$birthday')";

        if ($conn->query($sql) === TRUE) {
            $sql2 = "SELECT * FROM user WHERE email = '$email'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = $result2->fetch_assoc();
            $userid = $row2["guid"];

            $sql3 = "INSERT INTO `cart`(`userID`) VALUES ($userid)";
            echo "Success";
        } else {
            echo "Error";
        }
        require_once("checkLoginSession.php");
        header("Location: ../frontend/login.php?signup=success");
    }
}

$conn->close();
