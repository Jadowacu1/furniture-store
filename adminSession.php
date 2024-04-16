<?php
session_start();
// Check if user is logged in
if (!isset($_SESSION['Role'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}
