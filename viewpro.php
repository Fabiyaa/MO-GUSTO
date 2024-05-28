<?php
include("connection.php");

if (isset($_POST["addpro"])) {
    // Retrieve form data and sanitize it
    $name = mysqli_real_escape_string($conn, $_POST['pro_name']);
    $flavour = mysqli_real_escape_string($conn, $_POST['pro_flavour']);
    $quantity = mysqli_real_escape_string($conn, $_POST['pro_quantity']);
    $price = mysqli_real_escape_string($conn, $_POST['pro_price']);
    $image = $_FILES['pro_image'];

    // Validate inputs
    if (empty($name) || empty($flavour) || empty($quantity) || empty($price) || empty($image)) {
        die('Please fill all the fields');
    }

    // File upload handling
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($image["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is an actual image
    $check = getimagesize($image["tmp_name"]);
    if ($check === false) {
        die("File is not an image.");
    }

    // Check file size
    if ($image["size"] > 500000) {
        die("Sorry, your file is too large.");
    }

    // Allow certain file formats
    if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    }

    // Attempt to move the uploaded file to the target directory
    if (!move_uploaded_file($image["tmp_name"], $targetFile)) {
        die("Sorry, there was an error uploading your file.");
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO product (pro_name, pro_flavour, pro_quantity, pro_price, pro_image) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssids", $name, $flavour, $quantity, $price, $targetFile);

    if ($stmt->execute()) {
        echo "New record created successfully";
        header("Location:display.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
