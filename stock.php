<?php
@include 'config_admin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Availability</title>
    <link rel="stylesheet" href="css/admin_style.css">
    <link rel="shortcut icon" href="image/HealthifyMe-Success-Story_Startuptalky.jpg" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display:scroll;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            padding: 30px; /* Increased padding */
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 80%; /* Increased width */
            max-width: 1000px; /* Larger max width */
        }

        
        h1 {
            color: #333;
            margin-bottom: 25px;
            font-size: 32px; /* Increased font size */
            font-weight: bold;
        }

        
        table {
            width: 100%;
           
            border-collapse: collapse;
            margin-top: 25px;
            font-size: 22px; /* Increased font size */
        }

       
        th {
            padding: 18px; /* Increased padding */
            border: 1px solid black;
            text-align: center;
            background-color: #007BFF;
            color: white;
            font-size: 24px; /* Larger font */
        }

        
        td {
           
            padding: 18px; /* Increased padding */
            border: 1px solid black;
            background-color: #f9f9f9;
            font-size: 22px; /* Larger font */
        }

        
        tbody tr:nth-child(even) {
            background-color:rgb(155, 151, 151);
        }

        
        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 14px 30px; /* Bigger button */
            background:rgb(200, 93, 26);
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            font-size: 20px; /* Larger text */
            border-radius: 8px;
            transition: 0.3s ease;
        }

        .btn:hover {
            background: #218838;
        }

</style>
</head>
<body>

<div class="container">
    <h1>Stock Availability</h1>
    <table>
        <thead>
            <tr>
                <th>Medicine</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stock_query = mysqli_query($conn, "SELECT * FROM `products`");
            while($row = mysqli_fetch_assoc($stock_query)){
                $stock = $row['stock'];
                $color = ($stock <= 10) ? "red" : "black"; // Set red color for stock = 0
                echo "<tr>
                <td>".$row['name']."</td>
                <td style='color: $color;'>".$stock."</td>
              </tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="admin_page.php" class="btn">Back</a>
</div>

</body>
</html>
