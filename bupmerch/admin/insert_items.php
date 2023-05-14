<?php
    include('../connect.php');
if(isset($_POST['insert_items'])){

    $item_name=$_POST['item_name'];
    $item_description=$_POST['item_description'];
    
    //accessing images
    $item_image=$_FILES['item_image']['name'];

    //accessing tmp name
    $temp_image=$_FILES['item_image']['tmp_name'];

    $item_price=$_POST['item_price'];
    $item_status='true';

    //checking empty condition
    if ($item_name=='' or $item_description=='' or $item_price=='' or $item_image==''
    ){
        echo "<script>alert('Please fill all the required fields')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image,"./item_images/$item_image");

        //insert query
        $insert_items="insert into `items` (item_name, item_description, item_image, item_price, date, status) 
        values('$item_name', '$item_description', '$item_image', '$item_price', NOW(), '$item_status')";
        $result_query=mysqli_query($con,$insert_items);
        if($result_query){
            echo "<script>alert('Successfully inserted the item')</script>";
        }
    }

    }

?>

<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">
      <!-- Font Awesome Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
 integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
 crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> Insert Items </title>
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center"> Insert Items </h1>
        <!--form -->
        <form action="" method="post" enctype="multipart/form-data">

        <!-- Item Name -->
            <div class="form-outline mb-4 w-50 m-auto">
            <label for="item_name" class="form-label"> Item Name: </label>
            <input type="text" name="item_name"
            id="item_name" class="form-control" placeholder="Enter item name" 
            autocomplete="off" required="required">
    </div>

        <!-- Item Description -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="item_description" class="form-label"> Description </label>
            <input type="text" name="item_description" id="item_description" 
            class="form-control" placeholder="Enter description" 
            autocomplete="off" required="required">
    </div>  
         <!-- Item Image -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="item_image" class="form-label"> Item Image: </label>
            <input type="file" name="item_image" id="item_image" 
            class="form-control" required="required">
    </div>  
        <!-- Price -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="item_price" class="form-label"> Price: </label>
            <input type="text" name="item_price" id="item_price" 
            class="form-control" placeholder="Enter price" 
            autocomplete="off" required="required">
    </div>  
        <!-- Submit -->
        <div class="form-outline mb-4 w-50 m-auto">
        <input type="submit" name="insert_items" class="btn btn-warning mb-3 px-3" value="Insert Items">
    </div> 
    </form>
</body>
</html>