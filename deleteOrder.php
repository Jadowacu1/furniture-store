<?php
include('connection.php');
if (isset($_GET['id'])) {
    // Cancel button clicked, delete the order
    $id = $_GET['id']; // Extract the order ID for the "Cancel" action
    $deleteOrderQuery = "DELETE FROM orders WHERE Order_Id = '$id'";
    $del =  mysqli_query($conn, $deleteOrderQuery);
    if ($del) {
        header('location:order-handling.php');
    }
}
