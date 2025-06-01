<?php

@include 'config.php';

session_start();

if(isset($_POST['submit']))
{

   $name = $_POST['name'];
   $pass = md5($_POST['password']);


   $select = "SELECT * FROM  user WHERE  name = '$name' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['name'] == 'imsalik'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif ($row['name'] != 'imsalik') {
      
         $_SESSION['user_name'] = $row['name'];
         header('location:user.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <link rel="shortcut icon" href="image/HealthifyMe-Success-Story_Startuptalky.jpg" type="image/x-icon">
   <link rel="stylesheet" href="css/style_log.css">

</head>
<body>
   <div class="head">
      <h2>HEALTH-CART</h2>
   </div>
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" class="name" required placeholder="name">
      <input type="password" name="password" class="pass" required placeholder="password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>

</body>
</html>