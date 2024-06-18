<?php
    session_start();
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false) {
        header("Location: login.php");
    }
    require_once ("../backend/connection.php");
    $recordID = $_SESSION["id"];

    $sql = "SELECT * FROM user WHERE guid = '$recordID'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();

    $sql2 = "SELECT * FROM address WHERE userID = '$recordID'";
    $result2 = mysqli_query($conn, $sql2);

    $sql3 = "SELECT * from orders WHERE orderUser = '$recordID'";
    $result3 = mysqli_query($conn, $sql3)

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account</title>
    <!-- 这个暂时的罢了，之后design可以remove掉-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        .slot {
            width: 200px;
            height: 100px;
            padding: 10px;
            margin: 10px;
            display: block;
            border: 1px solid black;
            border-radius: 15px;
        }
        .slot p{
            margin: 0;
        }

        .material-symbols-outlined {
        font-variation-settings:
        'FILL' 0,
        'wght' 400,
        'GRAD' 0,
        'opsz' 24
        }
    </style>
</head>

<body>
    <!-- Session 1: user profile into + ediy -->
    <div id="userProfile">
        <form method="POST" action="../backend/updateProfile.php">
            <table>
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="firstName" value="<?php echo $row["firstName"] ?>"></td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td><input type="text" name="lastName" value="<?php echo $row["lastName"] ?>"></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $row["email"] ?></td>
                </tr>
                <tr>
                    <th>Mobile Num</th>
                    <td><?php echo $row["mobileNum"] ?></td>
                </tr>
                <tr colspan="2">
                    <input type="hidden" name="email" value="<?php echo $row["email"] ?>">
                    <td><input type="submit" name="MM_Update" value="Save"></td>
                </tr>
            </table>
        </form>
    </div>
    <!-- Session 2: Address -->
    <div id="address">
        <p>Address</p>
        <?php 
            while($row2 = $result2->fetch_assoc())
            {
        ?>
            <div id="slot" class="slot">
                <table>
                    <tr>
                        <td width="180px">
                            <p><?php echo $row2["addressName"] ?></p>
                            <p><?php echo $row2["unit"].", ".$row2["address"]." ".$row2["city"].", ".$row2["postcode"].", ".$row2["state"];?></p>
                        </td>
                        <td width="20px">
                            <input type="hidden" name="userID" value="<?php echo $row2["userID"]?>">
                            <td><a href="editAddress.php?id=<?php echo $row2["addressID"]?>"><span class="material-symbols-outlined">edit</span></a></td>
                        </td>
                    </tr>
                </table>
            </div>
        <?php
            }
        ?>
        <a href="addAddress.php"><button name="addAddress"> Add a new address</button></a>      
    </div>
    <!-- Session 3: Order History -->
    <div id="orders">
        <p>Order History</p>
        <?php 
            while($row3 = $result3->fetch_assoc())
            {
        ?>
            <div id="slot" class="slot" style="height:180px; width:250px;">
                <table>
                    <tr>
                        <td width="200px">
                            <!-- Order id and order time -->
                            <p><?php echo $row3["orderID"]. "   ".$row3["ordertime"] ?></p>
                            <!-- Order item and its quantity -->
                            <?php 
                                $mealArray = explode(',', $row3["orderItems"]);
                                $quantityArray = explode(',', $row3["orderQuantity"]);

                                for ($x = 0; $x < count($mealArray); $x++) {
                                    $mealID = $mealArray[$x];
                                    $sqlMeal = "SELECT * FROM meal WHERE mealID = '$mealArray[$x]'";
                                    $resultM = mysqli_query($conn, $sqlMeal);
                                    $rowM = $resultM->fetch_assoc();
                                    echo "<p>".$rowM["mealName"]."    ".$quantityArray[$x]."</p>";
                                }
                                
                                ?>
                                <!-- Order total amount -->
                                <p><?php echo "RM".$row3['totalAmount'];?></p>
                                <!-- Delivery address -->
                                <p>
                                    <?php 
                                    $curAddID = $row3['addressID'];
                                    $sqlAdd = "SELECT * FROM address WHERE addressID = '$curAddID'";
                                    $resultAdd = mysqli_query($conn, $sqlAdd);
                                    $rowAdd = $resultAdd->fetch_assoc();
                                    echo $rowAdd["addressName"]."<br>";
                                    echo $rowAdd["unit"].", ".$rowAdd["address"]." ".$rowAdd["city"].", ".$rowAdd["postcode"].", ".$rowAdd["state"];
                                    ?>
                                </p>
                            </td>
                    </tr>
                </table>
            </div>
        <?php
            }
        ?>
    </div>
    <!-- Session 4: Changing password -->
    <div id="changePassword">
        <form method="POST" action="../backend/changePassword.php">
            <table>
                <tr>
                    <th>Current Password</th>
                    <td><input type="text" name="currentPW"></td>
                </tr>
                <tr>
                    <th>New Password</th>
                    <td><input type="text" name="newPW"></td>
                </tr>
                <tr colspan="2">
                    <input type="hidden" name="email" value="<?php echo $row["email"] ?>">
                    <td><input type="submit" name="MM_Update" value="Confirm"></td>
                </tr>
            </table>
        </form>
    </div>
    <!-- Session 5: Logout -->
    <a href="../backend/logout.php"><button>Logout</button></a>
</body>
<?php $conn->close();?>
</html>