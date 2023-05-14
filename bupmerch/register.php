<?php

include 'db_conn.php';

if(isset($_POST['submit'])){

    

   $fname = mysqli_real_escape_string($conn, $_POST['fullname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $course = mysqli_real_escape_string($conn, $_POST['course']);
   $year = mysqli_real_escape_string($conn, $_POST['year']);
   $block = mysqli_real_escape_string($conn, $_POST['block']);
   $password = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE fullname = '$fname' AND email = '$email' AND  course = '$course' AND year = '$year' AND block = '$block'  AND password = '$password'") or die(' failed');
   
   if($cpass != $password){
     header('location:register.php');
     $message[]= 'Password Not Match';

 }
    else{

        if(mysqli_num_rows($select) > 0){
            $row = mysqli_fetch_assoc($select);
            if($email == isset($row['email'])){
            header ('location: register.php?email already exists');
            }
            
         }else{
            mysqli_query($conn, "INSERT INTO `users`( fullname, email, course, year, block, password, user_status, user_type) VALUES( '$fname','$email', '$course', '$year', '$block', '$password', 'A', 'C' )") or die('query failed');
            $message[] = 'registered successfully!';
            header('location:log_in.php');
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
    <title>Registration</title>
    <link rel="stylesheet" href="stylee.css">
</head>
<body>
    <div class= containerr>
    <div class="loginform">
        
        <form action="" method="post">
            <h2>register now</h2>
            <input type="text" name="fullname" required placeholder="enter fullname" class="box">
            <input type="email" name="email" required placeholder="enter email" class="box">
            <input type="text" name="course" required placeholder="enter course" class="box">
            <input type="number" min = 1 name="year" required placeholder="enter year level" class="box">
            <input type="char" name="block" required placeholder="enter block" class="box">
            <input type="password" name="password" required placeholder="enter password" class="box">
            <input type="password" name="cpassword" required placeholder="confirm password" class="box">
            <input type="submit" name="submit" class="btnn" value="Register Now">

        <p>Already have an account? <a href="log_in.php">Login now</a></p>
        </form>

    </div>
</div>
</body>
</html>