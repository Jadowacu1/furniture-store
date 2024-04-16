<?php
include('connection.php');
if (isset($_GET['id'])) {
    // Process button clicked, update status to "delivered"
    $id = $_GET['id'];
    $updateStatusQuery = "UPDATE orders SET Status = 'Delivered' WHERE Order_Id = $id";
    $upd =  mysqli_query($conn, $updateStatusQuery);
    if ($upd) {
        header('location:order-handling.php');
    }
}
