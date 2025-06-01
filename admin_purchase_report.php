<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$purchases = $conn->query("SELECT * FROM products");
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Purchase Details</h2>
        <table>
            <tr>
                <th>No.</th>
                <th>Medicine Name</th>
                <th>Previous Stock</th>
                <th>Purchased Quantity</th>
                <th>Updated Stock</th>
                <th>Status</th>
            </tr>
            <?php 
            $no = 1;
            while ($row = $purchases->fetch_assoc()) { 
                $prev_stock = $row['stock'] - $row['last_purchased'];
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $prev_stock; ?></td>
                <td><?php echo $row['last_purchased']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                
                <td>Success</td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <div class="back-button">
        <button class="btn" onclick="history.back()">← Back</button>
    </div>
</body>
</html>


<style>
    body
    { font-family: Arial, sans-serif;
    background: linear-gradient(213deg, rgb(246, 163, 240), rgb(71, 4, 71));
    
    }
    .container
     { 
        width: 70%; 
        margin: auto; 
        padding: 20px; 
        background: white; 
        box-shadow: 0px 0px 10px 0px grey; 
        text-align: center; 
        border-radius:10px;
    }
    h2 { margin-bottom: 20px; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    table, th, td { border: 1px solid black; padding: 10px; text-align: center; }
    th { background-color: #007bff; color: white; }

    .back-button {
            margin-top: 20px;
            text-align:center;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: 0.3s;
            border: none;
            cursor: pointer;

        }
        .btn:hover {
            background-color: #0056b3;
        }
</style>
