<?php
// Connect to database
include_once 'db_conn.php';
?>
<style>
    h1 {
      text-align: center;
    }
  </style>
</head>
<body>
  <h1>ORDER DETAILS</h1>

</html>
<form>

<?php
// View the orders
$sql = "SELECT o.name, o.address, o.email, o.total, o.order_id, 
			od.quantity, 
			p.prod_name, p.prod_price
	FROM orders o
	JOIN order_details od ON o.order_id = od.order_id
	JOIN products p ON od.prod_id = p.prod_id
	WHERE o.order_id";
	
$result = mysqli_query($conn, $sql);

// check if any rows were returned
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Product: " . $row['prod_name'] . "<br>";
        echo "Quantity: " . $row['quantity'] . "<br>";
        echo "Price: " . $row['prod_price'] . "<br>";
        echo "Name: " . $row['name'] . "<br>";
        echo "Address: " . $row['address'] . "<br>";
        echo "Email: " . $row['email'] . "<br><br>";
		echo "Total Price: " . $row['total'] . "<br><br>";
    }
} else {
    echo "No orders found.";
}
?>

</form>


<html>
<head>
	<title>Order List</title>
</head>
<body>
	<form action="index.php" method="post">
	<input type="submit" value="Buy Again">
	</form>

</body>
</html>