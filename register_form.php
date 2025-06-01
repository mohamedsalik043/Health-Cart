<?php

@include 'config.php';

if(isset($_POST['submit'])){

   // Get user input safely
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);

   // Check if email already exists
   $select = "SELECT * FROM user WHERE email = ?";
   $stmt = mysqli_prepare($conn, $select);
   mysqli_stmt_bind_param($stmt, "s", $email);
   mysqli_stmt_execute($stmt);
   $result = mysqli_stmt_get_result($stmt);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'User already exists!';
   } elseif ($pass != $cpass) {
      $error[] = 'Passwords do not match!';
   } else {
      
      // Insert user into database securely
      $insert = "INSERT INTO user(name, email, password) VALUES(?, ?, ?)";
      $stmtInsert = mysqli_prepare($conn, $insert);
      mysqli_stmt_bind_param($stmtInsert, "sss", $name, $email, $pass);

      if (mysqli_stmt_execute($stmtInsert)) {
         header('location: login_form.php');
         exit();
      } else {
         $error[] = 'Registration failed!';
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Form</title>

   <link rel="shortcut icon" href="image/HealthifyMe-Success-Story_Startuptalky.jpg" type="image/x-icon">
   <link rel="stylesheet" href="css/style_log.css">

</head>
<body>
<div class="head">
      <h2>HEALTH-CART</h2>
</div>
   
<div class="form-container">
   <form action="" method="post">
      <h3>Register Now</h3>
      <?php
      if(isset($error)){
         foreach($error as $err){
            echo '<span class="error-msg">'.$err.'</span>';
         }
      }
      ?>
      <input type="text" name="name" required placeholder="Name">
      <input type="email" name="email" required placeholder="Email">
      <input type="password" name="password" required placeholder="Password">
      <input type="password" name="cpassword" required placeholder="Confirm Password">
   
      <input type="submit" name="submit" value="Register Now" class="form-btn">
      <p>Already have an account? <a href="login_form.php">Login Now</a></p>
   </form>
</div>

</body>
</html>
