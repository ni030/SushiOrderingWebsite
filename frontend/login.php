<!DOCTYPE html>
<html lang="en">

<?php
    //initial the session
    session_start();
    //if alr login, direct to index.page
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        header("location: ../frontend/index.php");
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form method="POST" action="http://localhost/sushiorderweb/backend/loginUser.php">
        <table>
            <tr>
                <th>Email</th>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="text" name="password"></td>
            </tr>
            <tr colspan=2>
                <td><input type="submit" name="MM_select" value="Login"></td>
            </tr>
        </table>

    </form>
</body>

</html>
