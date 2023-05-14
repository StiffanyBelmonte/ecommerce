<?php 
    include_once 'db_conn.php';
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
    .container-fluid{
        font-size: 20px;
    }

    .cardd {
        background-color: orange;
        color: white;
        border-radius: 1rem;
        box-shadow: 0 3px 10px rgba(25, 25, 25, 10);
        padding: 1rem;
        margin: 1rem;
    }

    /* * {
        outline: red dashed 2px;
    } */

    .card-cont {
        display: grid;
        grid-template-columns: auto auto auto;
        height: 100%;
        gap: .5rem;
    }
    </style>
    <!-- font -->
</head>
<body>
    <div id="cantainer-background">
    <?php include 'a_header.php'; ?>

    <div class="container-fluid mt-4">
        <div class="row">
        <div class="col-lg-12">
         <form action="" method="POST">
              <div class="input-group mb-3">
                  <span class="input-group-text">Between </span>
                  <input type="date" name="start_date" class="form-control">
                  <span class="input-group-text"> and </span>
                  <input type="date" name="end_date" class="form-control">
                  <input type="submit" name="filter_range" value="filter" class="btn btn-primary">
              </div>
          </form>
       </div>
        <?php
            if(isset($_POST['filter_date'])){
                $report_sql="SELECT 
                DATE(date_ordered) as order_date, 
                COUNT(*) as count_orders, 
                SUM(total_price) as total_sales 
                FROM `order` 
                WHERE DATE(date_ordered) = ? 
                GROUP BY DATE(date_ordered)";
                $reports = query($conn, $report_sql, array($_POST['this_date']));
            } else if(isset($_POST['filter_range'])){
                $report_sql="SELECT 
                DATE(date_ordered) as order_date, 
                COUNT(*) as count_orders, 
                SUM(total_price) as total_sales 
                FROM `order` 
                WHERE DATE(date_ordered) BETWEEN ? AND ? 
                GROUP BY DATE(date_ordered)";
                $reports = query($conn, $report_sql, array($_POST['start_date'], $_POST['end_date']));
            } else {
                $report_sql="SELECT 
                DATE(date_ordered) as order_date, 
                COUNT(*) as count_orders, 
                SUM(total_price) as total_sales 
                FROM `order`
                GROUP BY DATE(date_ordered)";
                $reports = query($conn, $report_sql);
            }
            ?>
            <section class="card-cont">
                <section>
            <?php
        foreach($reports as $d){
            ?>
            <div class="cardd">
              <div>
                <header class="date-ordered"><?php echo $d['order_date']; ?></header>
              </div>
              <div>
                <div>Total Order % base on Target (100)</div>
                <div><progress value="<?php echo $d['count_orders']; ?>" max="100"></progress></div>
              </div>
              <div>
                <div>Total Sales</div>
                <div>Php.<?php echo number_format($d['total_sales'],2)?></div>
              </div>
              <div>
              </div>
            </div>
            <?php
              };
            ?>
                </section>
            </section>
    </div>
    </div>
</body>
</html>