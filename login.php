<?php
include("connection.php");
if(isset($_POST["submit"])){
    $username=$_POST['user'];
    $password=$_POST['pass'];

    $sql="select * from login where username='$username' and password ='$password'";
    $result=mysqli_query($conn,$sql);
    $row =mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count==1){
        header("Location:welcome.php");
    }
        else if($username=="admin" && $password==123){
header("Location:adminhome.php");
        }
    
    else{
        echo  '<script>
        window.location.href ="index.php";
        alert("Loign failed.invalid username or password!!!")
        </script>';
    }
}

?>