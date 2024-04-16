<?php
include 'session.php';
include 'connection.php';
$user_id = $_SESSION['user_id'];
// Check if form data is submitted            
if (isset($_POST['ok'])) {
    $id = $_POST['furniture_id'];
    $sql = "SELECT * FROM furnitures WHERE Furniture_Id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $qty = $_POST['quantity'];
    $total = $qty * $row['Price'];
    $_SESSION['qty'] = $_POST['quantity'];
    $_SESSION['name'] = $_POST['furniture'];
    $_SESSION['total'] = $total;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $furniture_id = $_POST['furniture_id']; // Retrieve furniture ID from the form
    $user_id = $_SESSION['user_id']; // Get user ID from session
    $quantity = $_POST['quantity'];
    $status = 'pending'; // Set default status
    $date = date("Y-m-d H:i:s"); // Current timestamp

    // Validation (you can add more validation as needed)
    if (empty($furniture_id) || empty($quantity)) {
        // Redirect back to the order form with an error message
        header("Location: order_form.php?error=empty_fields");
        exit();
    }

    // Create connection to the database
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL statement to insert the order into the database
    $sql = "INSERT INTO orders (User_Id, Furniture_Id, Quantity, Status, Date) 
            VALUES ('$user_id', '$furniture_id', '$quantity', '$status', '$date')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to a confirmation page
        header("Location: order_confirmation.php");
        exit();
    } else {
        // Redirect back to the order form with an error message
        header("Location: order_form.php?error=insert_failed");
        exit();
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect back to the order form if the form data is not submitted
    header("Location: order_form.php");
    exit();
}
