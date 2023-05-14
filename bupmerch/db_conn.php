<?php
$servername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="bupmerch";

$conn = mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

// Check connection
if (!$conn){
    die("Maintenance Mode.");
} if(isset($_GET['signout'])){
        session_destroy();
        header("Location:../index.php");
        exit();
}

session_start();

// $host = 'localhost';
// $user = 'root';
// $password = 'root';
// $db = 'bumerch';
// $port = 8889;

// $conn = mysqli_connect($host, $user, $password, $db, $port);

// Check connection
// if (mysqli_connect_errno()) {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   exit();
// }

// Check connection
// if (!$conn){
//     die("Maintenance Mode.");
// } if(isset($_GET['signout'])){
//         session_destroy();
//         header("Location:../index.php");
//         exit();
// }

// session_start();

function query($conn, $sql, $params = array()){
  $errmsg = false;
  $stmt=mysqli_stmt_init($conn);
  if(mysqli_stmt_prepare($stmt, $sql)){
      $str = NULL;
      $cnt_p = count($params);
      
      if($cnt_p > 0){
          foreach($params as $param){
              $str .= "s";
          }
          mysqli_stmt_bind_param($stmt, "{$str}" , ...$params );
      }
      //echo $sql;
      if(mysqli_stmt_execute($stmt)){
        
          $resultData = mysqli_stmt_get_result($stmt);
          if(!empty($resultData)){
                $arr=array();
                while($row = mysqli_fetch_assoc($resultData)){
                    array_push($arr,$row);
                }
                return $arr;
          }
            else{
              return true;
          }
      }
      else{
        return false;
      }
  }
  return false;
      
}