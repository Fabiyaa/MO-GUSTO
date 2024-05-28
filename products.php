<?php
include("connection.php");
if(isset($_POST["addpro"])){
    $name=$_POST['pro_name'];
    $flavour=$_POST['pro_flavour'];
    $quantity=$_POST['pro_quantity'];
    $price=$_POST['pro_price'];
    $image=$_POST['pro_image'];

    $query="INSERT INTO product (pro_name, pro_flavour, pro_quantity, pro_price, pro_image) VALUES ('$name', '$flavour', $quantity,'$price', '$image')";

    $result=mysqli_query($conn,$query);
    $row =mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count==1){
        header("Location:display.php");
    }
       
    
    else{
        echo  '<script>
        window.location.href ="index.php";
        alert("Loign failed.invalid username or password!!!")
        </script>';
    }
}

?>