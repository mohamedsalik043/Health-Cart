<?php

@include 'config_admin.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop_db";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $medicine_name = $_POST['medicine_name'];
    $purchase_quantity = $_POST['purchase_quantity'];

    // Check if the medicine exists
    $check_query = mysqli_query($conn, "SELECT * FROM `products` WHERE name='$medicine_name'");
    
    if (mysqli_num_rows($check_query) > 0) {
        // If medicine exists, update stock
        $row = mysqli_fetch_assoc($check_query);
        $new_stock = $row['stock'] + $purchase_quantity;
        $update_query = mysqli_query($conn, "UPDATE `products` SET stock='$new_stock',last_purchased='$purchase_quantity' WHERE name='$medicine_name'");

        if ($update_query) {
            echo "<script>alert('Stock updated successfully!');</script>";
        } else {
            echo "<script>alert('Error updating stock');</script>";
        }
    } 
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Management System</title>
    <link rel="stylesheet" href="css/purchase.css">
    <link rel="shortcut icon" href="image/HealthifyMe-Success-Story_Startuptalky.jpg" type="image/x-icon">
</head>
<body>

<div class="mcontainer">
    <h2>Pharmacy Management System</h2>
    <div class="form-box">
        <form method="POST">
            <div class="input-group">
                <label>Medicine Name:</label>
                <input type="text" name="medicine_name" placeholder="Enter medicine name" required>
            </div>
            <div class="input-group">
                <label>Quantity:</label>
                <input type="number" name="purchase_quantity" placeholder="Enter quantity" required>
            </div>
            <button type="submit" name="add">Add Medicine</button>
        </form>
        <br>
        <button onclick="window.history.back();">Back</button>
    </div>
</div>

</body>
</html>