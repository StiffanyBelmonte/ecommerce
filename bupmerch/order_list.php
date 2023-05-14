<?php 
    include_once 'db_conn.php';

    if (!isset($_SESSION['user_id'])) {
        header('location:../logInSignUp.php');
    }

    $user_id = $_SESSION['user_id'];

    if(isset($_POST['orderStatus'])){
        $orderStatus = $_POST['orderStatus'];
        $order_id = $_POST['order_id'];
    
        // Update the order status
        $stmt = $con->prepare("UPDATE orders SET order_status = ? WHERE order_id = ?");
        $stmt->bind_param("si", $orderStatus, $order_id);
    
        if ($stmt->execute()) {
            echo 'Order status updated successfully.';    
        } else {
            echo $stmt->error;
        }
    
        $stmt->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BU Merchandise</title>
    <link rel="shortcut icon" type="image" href="logo.png">
    <link rel="stylesheet" href="a_styles.css">
    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/3477ae541c.js" crossorigin="anonymous"></script>

    <!-- bootstrap link -->
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">  
    <style>
    .container{
        font-size: 20px;
        margin-top: 1em;
    }

    /* * {
        outline: red dashed 2px;
    } */
    </style>

</head>
<body>
<?php include 'header.php'; ?>
    <div id="cantainer-background">
        
<body>
    <div class="container justify-content-center">
        <div class="row">
            <div class="container">
                <table class="table table-sm table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <th>Name</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                        <th>Method</th>
                        <th>Year & Block</th>
                        <th>Total Products</th>
                        <th>Total Price</th>
                        <th>Date Ordered</th>
                        <th>Order Status</th>
                        <th>Reference Number</th>
                    </thead>
                    <?php 
                      $select_order = mysqli_query($conn, "SELECT * FROM `order` WHERE user_id = '$user_id'");
                      if(mysqli_num_rows($select_order) > 0){
                        while($row = mysqli_fetch_assoc($select_order)){
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['number']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['method']?></td>
                            <td><?php echo $row['year_block']?></td>
                            <td><?php echo $row['total_products']?></td>
                            <td><?php echo $row['total_price']?></td>
                            <td><?php echo $row['date_ordered']?></td>
                            <td><?php echo $row['order_status']?></td>
                            <td><?php echo $row['reference_number']?></td>
                            <?php
                        }
                    }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>