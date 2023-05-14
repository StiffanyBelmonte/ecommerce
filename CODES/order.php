<?php

@include 'db_conn.php';

if ( !isset ($_SESSION['user_id'])){
  header('location:log_in.php');
}

$user_id = $_SESSION['user_id'];

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['name'];
   $price = $_POST['price'];
   $product_image = $_POST['image'];
   
   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity, user_id) VALUES('$product_name', '$price', '$product_image', '1' , '$user_id')");
      $message[] = 'product added to cart succesfully';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUP Merch</title>
    <link rel="stylesheet" href="stylee.css">
    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- bootstrap link -->
    
    <!-- icons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- icons -->
    


</head>
<body>


    <!-- navbar top -->
    <div class="container">
        <div class="navbar-top">
            <div class="social-link">

                
                
            </div>
            <div class="logo">
                <h3>Bicol University Polangui Merchandise</h3>
            </div>
            <div class="icons">
                
                
                
            </div>
        </div>
    </div>
    <!-- navbar top -->

    <!-- main content -->
    <div class="main-content">
        <nav class="navbar navbar-expand-md" id="navbar-color">
           <div class="container">
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <span><i><img src="./image/menu.png" alt="" width="30px"></i></span>
            </button>
          
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#products">Products</a>
                </li>                
                <li class="nav-item">
                  <a class="nav-link" href="clientviewcart.php">Cart</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="order_list.php">Orders</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php"> Log Out</a>
                </li>

              </ul>
            </div>
           </div> 
          </nav>


          <div class="content">
            <h1>Welcome </h1>
                <h1>BUeños to BUP </h1>
                <h1> Merch.
            </h1>
            <p></p>
            <div id="btn1">
                <a href="#products">
                    <button >Shop Now</button>
                </a>
            </div>
          </div>
          
    </div>
    <!-- main content -->

    <!-- card3 -->


      
    <div class="container1">
    <div class="products">
    <div class="box-container">

<?php
     include_once 'db_conn.php';
   $select_product = mysqli_query($conn, "SELECT * FROM products") or die('query failed');
   if(mysqli_num_rows($select_product) > 0){
      while($fetch_product = mysqli_fetch_assoc($select_product)){
?>
   <form method="post" class="box" action="" id="products">
      <img src="images/<?php echo $fetch_product['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_product['name']; ?></div>
      <div class="price">₱<?php echo $fetch_product['price']; ?></div>
      <form method="post" class="bttn8" action="">
      <input type="hidden" name="image" value="<?php echo $fetch_product['image']; ?>">
      <input type="hidden" name="name" value="<?php echo $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?php echo $fetch_product['price']; ?>">
      <input type="submit" value="Add to Cart" name="add_to_cart" class="btn1" href="#products">
   </form>
<?php
   };
};
?>

</div>
</div>
</div>

<div class="container2" id="about">
        <h3 class="text-center" style="padding-top: 30px;"></h3>
        <div class="row" style="margin-top: 80px;">
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="./image/c1.jpeg" alt="" class="card image-top" height="200px">
                    <div class="card-body">
                        <h5 class="card-titel text-center">VISION</h5>
                        <p class="text-center">A World Class University Producing Leaders and Change Agents for Social Transformation and Development.</p>
                        <div id="btn2" class="text-center"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="./image/c2.jpeg" alt="" class="card image-top" height="200px">
                    <div class="card-body">
                        <h5 class="card-titel text-center">MISSION</h5>
                        <p class="text-center">To give professional and technical training and provide advanced and specialized instruction in literature, philosophy, the sciences and arts, besides providing for the production of scientific and technological researches (Sec. 3.0, R.A. 5521). Hence, the BU graduates shall be distinguished by four pillars of the University: Leadership, Scholarship, Character and Service.</p>
                        <div id="btn2" class="text-center"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="./image/c3.jpg" alt="" class="card image-top" height="200px">
                    <div class="card-body">
                        <h5 class="card-titel text-center">QUALITY POLICY</h5>
                        <p class="text-center">Bicol University commits to continually strive for excellence in instruction, research and extension by meeting the highest level of clientele satisfaction and adhering to quality standards and applicable statutory and regulatory requirements.</p>
                        <div id="btn2" class="text-center"></div>
                    </div>
                </div>
            </div>
        </div>


    <!-- footer -->
    <footer id="footer">
        <h1 class="text-center">BU Merch</h1>
        <p class="text-center">BUP MERCH THAT IS AFFORDABLE AND AUTHENTIC</p>
        <div class="icons text-center">
           
        </div>
        <div class="copyright text-center">
            &copy; Copyright <strong><span>BU MERCH</span></strong>. All Rights Reserved
        </div>
        <div class="credite text-center">
            Designed By <a href="#">BLACKLIST</a>
        </div>
    </footer>
    <!-- footer -->




</body>
</html>
