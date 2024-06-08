<?php
    require_once("connection.php");
    if(isset($_POST["MM_Update"]) && $_POST["MM_Update"]== "Confirm"){
        if(empty($_POST["currentPW"]) || empty($_POST["newPW"])){
            exit("Have null value(s)");
        }else{
            $email = $_POST["email"];
            $currentPW = $_POST["currentPW"];
            $newPW = $_POST["newPW"];

            $sql = "SELECT * FROM user WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $row = $result->fetch_assoc();

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

            if($decryption !== $currentPW){
                exit("Wrong current Password");
            }else{
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
                    $newPW,
                    $ciphering,
                    $encryption_key,
                    $options,
                    $encryption_iv
                );

                $updateSQL = "UPDATE user SET password='$encryption' WHERE email = '$email'";
                $resultUpdate = mysqli_query($conn, $updateSQL);

                if (!$resultUpdate) {
                    die("Update failed: " . mysqli_error($conn));
                } else {
                    echo "Record updated successfully";
                    //header("Location: ../frontend/userAccount.php");
                }
            }

        }
    }
        ?>