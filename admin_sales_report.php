<?php

@include 'config_admin.php';

// Fetch sales data
$query = "SELECT id, name, flat, street, city, state, total_products, total_price, sale_date FROM `order` ORDER BY sale_date ASC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');
        html{
            height:100%;
            background-repeat: no-repeat;
        }
        body { 
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(213deg, rgb(246, 163, 240), rgb(71, 4, 71));
            text-align: center;
            padding: 20px;
            
        }
        h2 {
            font-size:40px;
            color: white;
            text-shadow: #333;
        }
        table { 
            width: 90%; 
            margin: 20px auto;
            border-collapse: collapse; 
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td { 
            padding: 12px; 
            border: 0.5px solid black; 
            text-align: left; 
        }
        th { 
            background-color: #007BFF; 
            color: white; 
            font-weight: bold;
        }
        tr:nth-child(even) { 
            background-color: #f2f2f2; 
        }
        tr:hover { 
            background-color:rgb(151, 248, 255);
        }
        td { 
            color: #555; 
        }
        .total-price {
            font-weight: bold;
            color:rgb(167, 40, 40);
        }
        .back-button {
            margin-top: 20px;
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
</head>
<body>

<h2>SALES-REPORT</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Flat</th>
            <th>Street</th>
            <th>City</th>
            <th>State</th>
            <th>Total Products</th>
            <th>Total Price</th>
            <th>Sale Date</th>
        </tr>
    </thead>
    <tbody>
        <?php if(mysqli_num_rows($result) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['flat']; ?></td>
                    <td><?php echo $row['street']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td><?php echo $row['state']; ?></td>
                    <td><?php echo $row['total_products']; ?></td>
                    <td class="total-price">RS. <?php echo number_format($row['total_price'], 2); ?></td>
                    <td><?php echo $row['sale_date']; ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="9">No sales records found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>
<div class="back-button">
    <button class="btn" onclick="history.back()">← Back</button>
</div>
</body>
</html>

<?php mysqli_close($conn); ?>
