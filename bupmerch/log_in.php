<?php

include 'db_conn.php';


if(isset($_POST['login'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password' ") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['user_id'];
      $user_type= $row['user_type'];
      if($user_type== 'A'){
      header('location:admin.php');
      }
   
   else{
      header('location:order.php');
   }
      
   }else{
      $message[] = 'incorrect password or email!';
      header('location:log_in.php?incorrect_password_email');
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylee.css">


    <title>Login</title>
</head>
<body>
    <div class= "containerr">
        <div class= "loginform">
                <form action= "" method= "post">
                <h2 >Login Here</h2>
                <input type="email" name="email" required placeholder="Enter Email Here" class= "box">
                <input type="password" name="password" required placeholder="Enter Password Here" class="box">
               <button name = "login" class="btnn">Log In</button>
                <p class="link">Don't have an acount?  <a href="register.php">Sign up here</a></p>
                <p class="link">Log in with</p>
                </form>
        
        </div>
    </div>



<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
    

    
</body>
</html>
        
        
       