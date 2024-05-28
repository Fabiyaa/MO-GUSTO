<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="form">
        <h1>Add Desserts Here</h1>
        <form name="form" action="display.php" method="POST" enctype="multipart/form-data">
            <label for="pro_name">Name</label>
            <input type="text" id="pro_name" name="pro_name" required></br></br>
            
            <label for="pro_flavour">Flavour</label>
            <input type="text" id="pro_flavour" name="pro_flavour" required></br></br>
            
            <label for="pro_quantity">Quantity</label>
            <input type="number" id="pro_quantity" name="pro_quantity" required></br></br>
            
            <label for="pro_price">Price</label>
            <input type="number" step="0.01" id="pro_price" name="pro_price" required></br></br>
            
            <label for="pro_image">Image</label>
            <input type="file" id="pro_image" name="pro_image" required></br></br>
            
            <input type="submit" id="btn" value="Add" name="addpro"/>
        </form>
    </div>
</body>
</html>
