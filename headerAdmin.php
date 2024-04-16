<?php
include 'adminSession.php';
// Get the current page URL
$currentPageUrl = $_SERVER['REQUEST_URI'];

// Extract the file name from the URL
$currentPage = basename($currentPageUrl);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            /* Almost white */
            color: #121e31;
            /* Text color */
        }

        .header {
            background-color: #d3f2ff;
            /* White */
            color: #121e31;
            /* Text color */
            padding: 20px;
            display: flex;
            gap: 90px;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        .logo {
            font-size: 1.5em;
            font-weight: bold;
            text-transform: uppercase;
        }

        .nav-links {
            display: flex;
            list-style-type: none;
            margin: 0;
            padding: 0;
            gap: 20px;
            /* Restoring the gap between elements */
        }

        .nav-links li {
            border-radius: 5px;
        }

        .nav-links li a {
            color: #121e31;
            text-decoration: none;
            font-size: 1.1em;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
            padding: 8px 16px;
            border: 1px solid transparent;
            border-radius: 80px;
        }

        .nav-links li a:hover {
            background-color: #121e31;
            color: #ffffff;
            border-color: #121e31;
        }

        /* Dropdown Menu */
        .dropdown {
            position: relative;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 200px;
            /* Increased width and height */
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
            min-height: 80px;
            /* Increased width */
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
        }

        .dropdown.active .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: #121e31;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s, color 0.3s;
        }

        .dropdown-content a:hover {
            /* background-color: #121e31; */
            color: #ffffff;
        }

        .nav-links li a.active,
        .nav-links li a:hover {
            background-color: #121e31;
            color: #ffffff;
            border-color: #121e31;
        }
    </style>

</head>

<body>
    <div class="header">
        <div class="logo">Furniture Store</div>
        <ul class="nav-links">
            <li><a href="furniture-registration.php" <?php if ($currentPage == 'furniture-registration.php') echo 'class="active"'; ?>>Furniture Registration</a></li>
            <li><a href="view-furniture.php" <?php if ($currentPage == 'view-furniture.php') echo 'class="active"'; ?>>View Furniture</a></li>
            <li><a href="view-customers.php" <?php if ($currentPage == 'view-customers.php') echo 'class="active"'; ?>>View Customers</a></li>
            <li><a href="order-handling.php" <?php if ($currentPage == 'order-handling.php') echo 'class="active"'; ?>>Order Handling</a></li>
            <li class="dropdown">
                <a href="#" class="user-icon" <?php if ($currentPage == 'account_settings.php') echo 'class="active"'; ?>><i class="fas fa-user"></i></a>
                <div class="dropdown-content" id="dropdownContent">
                    <a href="adminSettings.php"><i class="fas fa-cog account-settings-icon"></i> Account Settings</a>
                    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>

    <script>
        // JavaScript to toggle dropdown menu on click
        document.addEventListener('DOMContentLoaded', function() {
            const dropdown = document.querySelector('.dropdown');

            dropdown.addEventListener('click', function() {
                this.classList.toggle('active');
            });

            // Close dropdown when clicking outside
            window.addEventListener('click', function(e) {
                if (!dropdown.contains(e.target)) {
                    dropdown.classList.remove('active');
                }
            });
        });
    </script>
</body>

</html>