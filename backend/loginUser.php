<?php

require_once ("connection.php");

if ((isset($_POST["MM_select"])) && $_POST["MM_select"] == "Login") {
    //Check for empty inserted value(s)
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        exit("Have null value(s).");
    } else {
        $recordID = $_POST["email"];
        $enterPassword = $_POST["password"];

        //prevent SQL injection
        $recordID = stripcslashes($recordID);
        $enterPassword = stripcslashes($enterPassword);
        $recordID = mysqli_real_escape_string($conn, $recordID);
        $enterPassword = mysqli_real_escape_string($conn, $enterPassword);
        $sql = "SELECT * from user WHERE email = '$recordID'";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        $count = mysqli_num_rows($result);

        //Detect is the email entered is exist
        if ($count == 0) {
            exit("User entered is no exist.");
        } else {
            //Password Decryption
            // Store the cipher method
            $ciphering = "AES-128-CTR";

            // Use OpenSSl Encryption method
            $iv_length = openssl_cipher_iv_length($ciphering);
            $options = 0;

            // Non-NULL Initialization Vector for decryption
            $decryption_iv = '0810071600151260';

            // Store the decryption key
            $decryption_key = "sushiorderweb";

            // Use openssl_decrypt() function to decrypt the data
            $decryption = openssl_decrypt(
                $row["password"],
                $ciphering,
                $decryption_key,
                $options,
                $decryption_iv
            );

            if ($enterPassword === $decryption) {
                //set session
                session_start();
                $_SESSION["loggedin"] = TRUE;
                $_SESSION["id"] = $row["guid"];
                $_SESSION["name"] = $row["firstName"];
                // echo "login success".$_SESSION["name"];
                header("location: ../frontend/index.php");
            } else {
                echo "Invalid password.";
            }
        }

    }
}

$conn->close();

?>