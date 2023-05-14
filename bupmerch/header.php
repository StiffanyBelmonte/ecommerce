<header class="header">

   <div class="flex">

      <a href="index.php" class="logo">BUP MERCHANDISE</a>

      <nav class="navbar">
         <a href="order.php">Home</a>
         <a href="order.php#products">View products</a>
       
         <a href="logout.php">Log Out</a>
      </nav>

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>


      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>