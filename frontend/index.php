<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script>
        function logout(){
            window.location.href = "../backend/logout.php";
        }
    </script>
</head>
<body>
    <?php
    session_start();
    if ($_SESSION["name"] !== null) {
        echo "HI, ".$_SESSION["name"];
    }
    ?>
    <button onclick="logout()">Logout</button>
</body>
</html>