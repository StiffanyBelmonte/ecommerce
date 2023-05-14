<?php 
    include_once 'db_conn.php';
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
    <link rel="stylesheet" href="styleabout.css">
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
    </style>
</head>
<body>
    <div id="cantainer-background">
        <nav class="navbar navbar-expand-md" id="navbar-color">
            <!-- Brand -->
            <a class="navbar-brand" href="index.php" id="logo-color"><i><img src="img/logo.png" alt=""></i>BurgerBite</a>
          
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <span><i><img src="img/menu.png" alt="" id="menu-color"></i></span>
            </button>
          
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="indexland.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="admin_order.php">Order List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="view.php">View Products</a>
                  <li class="nav-item">
                  <a class="nav-link" href="aboutus.php">ABOUT Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="viewu.php">View Users</a>
                  <li class="nav-item">
                  <a class="nav-link" href="sales.php">Sales</a>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php">LOGOUT</a>
                </li>
              </ul>
            </div>
          </nav>
<body>
    <div class="container justify-content-center">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                            <th>Orders</th>
                            <th>Date Ordered</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php 
                        $sql = "SELECT * FROM orders";
                        $result = mysqli_query($conn, $sql);
                        foreach($result as $key => $row){
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['total_orders']?></td>
                            <td><?php echo $row['total_price']?></td>
                            <td><?php echo $row['product_names']?></td>
                            <td><?php echo $row['date_ordered']?></td>
                            <td><?php echo $row['order_status']?></td>
                            <td>
                                <form method="POST" action="">
                                    <input type="hidden" name="order_id" value="<?php echo $row['order_id']?>">
                                    <label for="orderStatus">Order Status:</label>
                                    <select id="orderStatus" name="orderStatus">
                                        <?php if ($row['order_status'] == 'pending'): ?>
                                            <option value="pending" selected>Pending</option>
                                        <?php else: ?>
                                            <option value="pending">Pending</option>
                                        <?php endif; ?>

                                        <?php if ($row['order_status'] == 'confirmed'): ?>
                                            <option value="confirmed" selected>Confirmed</option>
                                        <?php else: ?>
                                            <option value="confirmed">Confirmed</option>
                                        <?php endif; ?>
                                        <?php if ($row['order_status'] == 'out for delivery'): ?>
                                            <option value="out for delivery" selected>out for delivery</option>
                                        <?php else: ?>
                                            <option value="out for delivery">out for delivery</option>
                                        <?php endif; ?>
                                        <?php if ($row['order_status'] == 'delivered'): ?>
                                            <option value="delivered" selected>delivered</option>
                                        <?php else: ?>
                                            <option value="delivered">Delivered</option>
                                        <?php endif; ?>
                                    </select>
                                    <input type="submit" value="Update Status">
                                </form>
                                <?php if (!empty($row['courier'])): ?>
                                    <p>Courier ID: <?php echo $row['courier']; ?></p>
                                <?php else: ?>
                                    <p>No designated courier yet</p>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody>
                    <?php 
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>