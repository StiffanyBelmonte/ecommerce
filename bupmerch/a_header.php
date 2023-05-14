<header class="header">

   <div class="flex">

      <a href="index.php" class="logo">BUP MERCHANDISE</a>

      <nav class="navbar">
         <a href="admin.php">Home</a>
         <a href="a_orderlist.php">Order List</a>
         <a href="sales_report.php">Sales Report</a>
         <a href="logout.php">Log Out</a>
      </nav>

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>


      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>