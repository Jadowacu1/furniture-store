<?php
include 'session.php';
include 'connection.php';
$user = $_SESSION['user_id'];
$id = $_GET['id'];
$sel = mysqli_query($conn, "SELECT Name,Description,Price,Photo FROM furnitures where Furniture_Id ='$id' ");
$row = mysqli_fetch_array($sel);
$name = $row['Name'];
$descp = $row['Description'];
$price = $row['Price'];
$photo = $row['Photo'];

$sql = "INSERT INTO cart (User_Id,Name,Description,Price,photo) VALUES ('$user','$name','$descp','$price','$photo')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Added to Cart');
    window.location.href = 'shopping-cart.php';
   </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
