<?php
include("connection.php");

$result = $conn->query("SELECT * FROM product");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
</head>
<body>
    <div id="products">
        <h1><center>Products List</center></h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Flavour</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['pro_name']}</td>
                            <td>{$row['pro_flavour']}</td>
                            <td>{$row['pro_quantity']}</td>
                            <td>{$row['pro_price']}</td>
                            <td><img src='{$row['pro_image']}' alt='{$row['pro_name']}' style='width:100px;'></td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No products found</td></tr>";
            }
            ?>
        </table>
    </div>

    <style>
        #body{
            background-color: azure;
        }
    </style>
</body>
</html>
