<?php

include 'db_conn.php';

if(isset($_POST['submit'])){

    

   $fname = mysqli_real_escape_string($conn, $_POST['fullname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE fullname = '$fname' AND email = '$email' AND password = '$password'") or die(' failed');
   
   if($cpass != $password){
     header('location:a_register.php?password_not_match');
     $message[]= 'Password Not Match';

 }
    else if(mysqli_num_rows($select) > 0){
            $row = mysqli_fetch_assoc($select);
            if($email == isset($row['email'])){
            header ('location: a_register.php?email_already_exists');
            }
            
         }else{
            mysqli_query($conn, "INSERT INTO `users`( fullname, email, password, user_status, user_type) VALUES( '$fname','$email', '$password', 'A', 'A' )") or die('query failed');
            $message[] = 'registered successfully!';
            header('location:log_in.php');
         }
   
        }

     




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class= "containerr">
    <div class="loginform">
        
        <form action="" method="post">
            <h2>register now</h2>
            <input type="text" name="fullname" required placeholder="enter fullname" class="box">
            <input type="email" name="email" required placeholder="enter email" class="box">
            <input type="password" name="password" required placeholder="enter password" class="box">
            <input type="password" name="cpassword" required placeholder="confirm password" class="box">
            <input type="submit" name="submit" class="btnn" value="Register Now">

        <p>Already have an account? <a href="log_in.php">Login now</a></p>
        </form>

    </div>
</div>
</body>
</html>